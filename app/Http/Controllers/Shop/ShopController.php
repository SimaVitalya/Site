<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\DeliveryMethod;
use App\Models\FAQ;
use App\Models\Notification;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductItem;
use App\Models\Setting;
use App\Models\UserOrder;
use App\Models\User;
use App\Models\marque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function __construct()
    {
        //            \auth()->login(User::first());
                    \auth()->login(User::find(123));
    }

    public function showShopPage()
    {
        //            if (Setting::get('app.access_only_for_users', false)) {
        //                $this->middleware('auth');
        //            }

        $categories = ProductCategory::orderByDesc('created_at')->get();

        return view('frontend/shop.shop', [
            'metaTITLE' => __('frontend/shop.meta.title.shop'),
            'metaDESC' => __('frontend/shop.meta.desc.shop'),
            'categories' => $categories,
            'showHeader' => true,
        ]);
    }

    public function shownewShopPage()
    {
        //            if (Setting::get('app.access_only_for_users', false)) {
        //                $this->middleware('auth');
        //            }

        $categories = ProductCategory::orderByDesc('created_at')->get();

        return view('frontend/shop.newshop', [
            'metaTITLE' => __('frontend/shop.meta.title.shop'),
            'metaDESC' => __('frontend/shop.meta.desc.shop'),
            'categories' => $categories,
            'showHeader' => true,
        ]);
    }

    public function buyProductForm(Request $request, $pId = null, $pAmount = null)
    {
        if (Setting::get('app.access_only_for_users', false)) {
            $this->middleware('auth');
        }

        if (!Auth::check()) {
            return redirect()->route('shop')->with([
                'errorMessage' => __('frontend/shop.must_logged_in'),
            ]);
        }

        $backAction = false;
        if ($pId != null && $pAmount != null) {
            $backAction = true;
        }

        if ($request->getMethod() == 'POST' || $backAction) {
            if ($backAction) {
                $productId = $pId;
            } else {
                $productId = $request->get('product_id');
            }

            $product = Product::where('id', $productId)->get()->first();

            if ($product == null) {
                return redirect()->route('shop')->with([
                    'errorMessage' => __('frontend/shop.product_not_found'),
                ]);
            }

            if ($backAction) {
                $amount = $pAmount;
            } else {
                $amount = intval($request->get('product_amount'));
            }

            if ($product->asWeight() && $amount > $product->getWeightAvailable()) {
                $amount = $product->getWeightAvailable();
            } elseif (!$product->asWeight() && !$product->isUnlimited() && $amount > $product->getStock()) {
                $amount = $product->getStock();
            }

            if ($amount <= 0) {
                return redirect()->route('shop');
            }

            if ($product->asWeight() && $product->getInterval() > 1) {
                if ($amount % $product->getInterval() != 0) {
                    $amount = round($amount / $product->getInterval(), 0,
                            \PHP_ROUND_HALF_DOWN) * $product->getInterval();

                    if ($amount > $product->getWeightAvailable()) {
                        $amount = $product->getWeightAvailable();
                    }

                    if ($amount == 0 && $product->getWeightAvailable() >= $product->getInterval()) {
                        $amount = $product->getInterval();
                    } elseif ($amount == 0) {
                        return redirect()->route('shop');
                    }
                }
            }

            $totalPriceInCent = \App\Classes\Rabatt::newprice($product->price_in_cent * $amount, $product->id, $amount);
            $bonus = null;
            $xx = \App\Classes\Rabatt::rabattpriceformat($product->price_in_cent * $amount, $product->id, $amount);
            $bonus = $xx;

            $totalPrice = Product::formatPrice($totalPriceInCent);

            $replaceEntry = FAQ::where('id', Setting::get('shop.replace_rules'))->first();

            return view('frontend/shop.product_confirm_buy', [
                'product' => $product,
                'amount' => $amount,
                'totalPrice' => $totalPrice,
                'totalPriceInCent' => $totalPriceInCent,
                'bonus' => $bonus,
                'replaceEntry' => $replaceEntry,
            ]);
        }

        return redirect()->route('shop');
    }

    public function buyProductConfirmForm(Request $request)
    {
        if (Setting::get('app.access_only_for_users', false)) {
            $this->middleware('auth');
        }

        if (!Auth::check()) {
            return redirect()->route('shop')->with([
                'errorMessage' => __('frontend/shop.must_logged_in'),
            ]);
        }

        if ($request->getMethod() == 'POST') {
            $productId = $request->get('product_id');
            $amount = intval($request->get('product_amount'));

            $product = Product::where('id', $productId)->get()->first();

            if ($product == null) {
                return redirect()->route('shop')->with([
                    'errorMessage' => __('frontend/shop.product_not_found'),
                ]);
            }

            $dropInfo = '';
            $status = 'nothing';

            $deliveryMethodId = 0;
            $deliveryMethodName = '';
            $deliveryMethodPrice = 0;

            $extraCosts = 0;

            if ($product->dropNeeded()) {
                $status = 'pending';

                $deliveryMethodId = $request->get('product_delivery_method') ?? 0;
                $deliveryMethod = DeliveryMethod::where('id', $deliveryMethodId)->get()->first();

                if ($deliveryMethod == null || !$deliveryMethod->isAvailableAmount($product->price_in_cent * $amount)) {
                    return redirect()->route('buy-product', [$productId, $amount])->with([
                        'errorMessage' => __('frontend/shop.delivery_method_needed'),
                        'productDrop' => $dropInfo,
                    ]);
                } else {
                    $extraCosts += $deliveryMethod->price;
                    $deliveryMethodName = $deliveryMethod->name;
                    $deliveryMethodPrice = $deliveryMethod->price;
                }

                if ($request->get('product_drop') == null) {
                    return redirect()->route('buy-product', [$productId, $amount])->with([
                        'errorMessage' => __('frontend/shop.order_note_needed'),
                        'productDrop' => $dropInfo,
                    ]);
                } elseif (strlen($request->get('product_drop')) > 500) {
                    return redirect()->route('buy-product', [$productId, $amount])->with([
                        'errorMessage' => __('frontend/shop.order_note_long', [
                            'charallowed' => 500,
                        ]),
                        'productDrop' => $dropInfo,
                    ]);
                } else {
                    $dropInfo = encrypt($request->get('product_drop'));
                }
            }

            if ($amount > 0 && ($product->isAvailableAmount($amount) || $product->isUnlimited())) {
                /*if($product->isUnlimited()) {
                    $amount = 1;
                }*/

                $priceInCent = \App\Classes\Rabatt::newprice($product->price_in_cent * $amount, $product->id, $amount);

                $priceInCent += $extraCosts;

                if (Auth::user()->balance_in_cent >= $priceInCent) {
                    $newBalance = Auth::user()->balance_in_cent - $priceInCent;

                    Auth::user()->update([
                        'balance_in_cent' => $newBalance,
                    ]);

                    if ($product->isUnlimited()) {
                        UserOrder::create([
                            'user_id' => Auth::user()->id,
                            'name' => $product->name,
                            'content' => $product->content,
                            'amount' => $amount,
                            'price_in_cent' => $product->price_in_cent,
                            'totalprice' => $priceInCent,
                            'drop_info' => $dropInfo,
                            'delivery_price' => $deliveryMethodPrice,
                            'delivery_method' => $deliveryMethodName,
                            'status' => $status,
                            'weight' => 0,
                            'weight_char' => '',
                        ]);

                        $product->update([
                            'sells' => $product->sells + 1,
                        ]);

                        Setting::set('shop.total_sells', Setting::get('shop.total_sells', 0) + 1);

                        Notification::create([
                            'custom_id' => Auth::user()->id,
                            'type' => 'order',
                        ]);

                        return redirect()->route('orders-with-pageNumber', 1)->with([
                            'successMessage' => __('frontend/shop.you_bought_with_amount', [
                                'name' => $product->name,
                                'amount' => $amount,
                                'totalprice' => Product::formatPrice($priceInCent),
                                'price' => $product->getFormattedPrice(),
                            ]),
                        ]);
                    } elseif ($product->asWeight()) {
                        UserOrder::create([
                            'user_id' => Auth::user()->id,
                            'name' => $product->name,
                            'amount' => 1,
                            'content' => $product->content,
                            'weight' => $amount,
                            'weight_char' => $product->getWeightChar(),
                            'price_in_cent' => $product->price_in_cent,
                            'totalprice' => $priceInCent,
                            'drop_info' => $dropInfo,
                            'delivery_price' => $deliveryMethodPrice,
                            'delivery_method' => $deliveryMethodName,
                            'status' => $status,
                        ]);

                        $product->update([
                            'sells' => $product->sells + $amount,
                            'weight_available' => $product->weight_available - $amount,
                        ]);

                        Setting::set('shop.total_sells', Setting::get('shop.total_sells', 0) + 1);

                        Notification::create([
                            'custom_id' => Auth::user()->id,
                            'type' => 'order',
                        ]);

                        return redirect()->route('orders-with-pageNumber', 1)->with([
                            'successMessage' => __('frontend/shop.you_bought_with_amount2', [
                                'name' => $product->name,
                                'amount_with_char' => $amount . $product->getWeightChar(),
                                'totalprice' => Product::formatPrice($priceInCent),
                                'price' => $product->getFormattedPrice(),
                            ]),
                        ]);
                    } else {
                        /*
                        * New order adding logic
                        */
                        $productContent = '';
                        $itemIDsToDestroy = [];
                        $productItems = ProductItem::where('product_id', $product->id)->take($amount)->get();
                        foreach ($productItems as $item) {
                            $productContent .= $item->content . '\r\n' . '\r\n';
                            array_push($itemIDsToDestroy, $item->id);
                        }

                        $product->update([
                            'sells' => $product->sells + $amount
                        ]);

                        ProductItem::destroy($itemIDsToDestroy);

                        Setting::set('shop.total_sells', Setting::get('shop.total_sells', 0) + $amount);

                        UserOrder::create([
                            'user_id' => Auth::user()->id,
                            'name' => $product->name,
                            'amount' => $amount,
                            'content' => $productContent,
                            'price_in_cent' => $product->price_in_cent,
                            'totalprice' => $priceInCent,
                            'weight' => 0,
                            'weight_char' => '',
                            'status' => $status,
                            'delivery_price' => $deliveryMethodPrice,
                            'delivery_method' => $deliveryMethodName,
                            'drop_info' => $dropInfo
                        ]);

                        Notification::create([
                            'custom_id' => Auth::user()->id,
                            'type' => 'order'
                        ]);

                        return redirect()->route('orders-with-pageNumber', 1)->with([
                            'successMessage' => __('frontend/shop.you_bought_with_amount', [
                                'name' => $product->name,
                                'amount' => $amount,
                                'totalprice' => Product::formatPrice($priceInCent),
                                'price' => $product->getFormattedPrice()
                            ])
                        ]);
                    }
                } else {
                    return redirect()->route('buy-product', [
                        'id' => $productId,
                        'amount' => $amount,
                    ])->with([
                        'errorMessage' => __('frontend/shop.not_enought_money'),
                    ]);
                }
            } else {
                return redirect()->route('shop')->with([
                    'errorMessage' => __('frontend/shop.product_not_available'),
                ]);
            }
        }

        return redirect()->route('shop');
    }

    public function showProductPage($productId)
    {
        //            if (Setting::get('app.access_only_for_users', false)) {
        //                $this->middleware('auth');
        //            }

        $product = Product::where('id', $productId)->get()->first();


        if ($product != null) {
            return view('frontend/shop.product', [
                'metaTITLE' => strip_tags($product->name),
                // 'metaDESC' => strip_tags(substr(strlen($product->description) ? decrypt($product->description) : '', 0, 65)),
                'metaDESC' => $product->description,
                'product' => $product,
                'amount' => $product->getFormattedPriceWithoutCurrency(),
                'productShowLongDes' => true,
            ]);
        }
        return view('frontend/shop.product_not_found');
    }

    public function showProductCategoryPage($slug = null)
    {
        //            if (Setting::get('app.access_only_for_users', false)) {
        //                $this->middleware('auth');
        //            }

        if ($slug == null && strtolower($slug) != 'uncategorized') {
            return redirect()->route('shop');
        }

        $productCategory = ProductCategory::where('slug', $slug)->get()->first();

        if ($productCategory == null && $slug != 'uncategorized') {
            return redirect()->route('shop');
        } elseif ($productCategory == null) {
            $products = Product::getUncategorizedProducts();
        } else {
            $products = Product::where('category_id', $productCategory->id)->get()->all();
        }

        return view('frontend/shop.products_category', [
            'products' => $products,
            'productCategory' => $productCategory ?? (object)['name' => __('frontend/shop.uncategorized')],
            'productCategoryUncategorized' => $productCategory == null ? true : false,
        ]);
    }

    public function showShopLogoPage()
    {
        if (Setting::get('app.access_only_for_users', false)) {
            $this->middleware('auth');
        }

        return view("backendV2.shop.shoplogo");
    }

    public function showShopLogoUpdate(Request $request)
    {
        if (Setting::get('app.access_only_for_users', false)) {
            $this->middleware('auth');
        }

        $request->validate([
            'logo' => 'mimes:png,jpg,jpeg',
            'banner' => 'mimes:png,jpg,jpeg',
            'shop_name' => 'max:255|min:3'
        ]);

        if (isset($validator)) {
            if ($validator->fails()) {
                return redirect()->back()->with("success", "Test");
            }
        }

        $msg = "something wen,t wrong.";
        if ($request->hasFile('logo')) {
            $logoName = time() . '1.' . $request->logo->extension();
            $request->logo->move('assets/newdesign/assets/img/creator/', $logoName);
            $update_data = ["photo" => $logoName];
            $update_query = User::where("id", 1)->update($update_data);
            $msg = "Logo Successfuly Updated";
        }

        if ($request->hasFile('banner')) {
            $bannerName = time() . '.' . $request->banner->extension();
            $request->banner->move('assets/newdesign/assets/img/creator/', $bannerName);
            $update_data = ["cover" => $bannerName];
            $update_query = User::where("id", 1)->update($update_data);
            $msg = "Banner Successfuly Updated";
        }

        if ($request->shop_name != "") {
            $update_data = ["shop_name" => $request->shop_name];
            $update_query = User::where("id", 1)->update($update_data);
            $msg = "Shop Name Successfuly Updated";
        }


        if (isset($update_query)) {
            if ($update_query) {
                return response()->json(["status" => true, "message" => $msg, "class" => "text-success"]);
            } else {
                // return back()->with("error","something went wrong");
                return response()->json(["status" => false, "message" => $msg, "class" => "text-danger"]);
            }
        } else {
            return response()->json(["status" => false, "message" => $msg, "class" => "text-danger"]);
            // return back()->with("error","something went wrong");
        }


    }

    public function marqueStatus(Request $request)
    {
        if (Setting::get('app.access_only_for_users', false)) {
            $this->middleware('auth');
        }

        sleep(2);
        if ($request->status == 'true') {
            $update_query = marque::where("status", 0)->update(["status" => 1]);
        } else {
            $update_query = marque::where("status", 1)->update(["status" => 0]);
        }

        if ($update_query) {
            $status = true;
            $msg = "Status Successfuly Changed";
            $responseCode = 200;
        } else {
            $status = false;
            $msg = "Status unsuccessfuly Changed";
            $responseCode = 400;
        }

        return response()->json(["status" => $status, "message" => $msg, "data" => "N/A"], $responseCode);
    }

    public function getMarquee(Request $request)
    {
        if (Setting::get('app.access_only_for_users', false)) {
            $this->middleware('auth');
        }

        $getData = marque::find($request->id);
        if ($getData) {
            $status = true;
            $msg = "Data Successfuly fetched.";
            $data = $getData;
            $statusCode = 200;
        } else {
            $status = false;
            $msg = "Data not be funded.";
            $data = "N/A";
            $statusCode = 404;
        }

        return response()->json(["status" => $status, "message" => $msg, "data" => $data], $statusCode);
    }

    public function deleteMarquee(Request $request)
    {
        if (Setting::get('app.access_only_for_users', false)) {
            $this->middleware('auth');
        }

        $getData = marque::find($request->id);
        $getData->delete();
        if ($getData) {
            $status = true;
            $msg = "Delete Successfuly fetched.";
            $data = $getData;
            $statusCode = 200;
        } else {
            $status = false;
            $msg = "Delete not be funded.";
            $data = "N/A";
            $statusCode = 404;
        }

        return response()->json(["status" => $status, "message" => $msg, "data" => $data], $statusCode);
    }

    public function updateMarquee(Request $request)
    {
        if (Setting::get('app.access_only_for_users', false)) {
            $this->middleware('auth');
        }

        $getData = marque::find($request->id);
        $updateData = ["marque_text" => $request->marqueeText];
        $query = $getData->update($updateData);
        $getData = marque::find($request->id);

        if ($query) {
            $status = true;
            $msg = "Marquee Successfuly Update.";
            $data = $getData;
            $statusCode = 200;
        } else {
            $status = false;
            $msg = "Marquee unsuccessfuly Update.";
            $data = "N/A";
            $statusCode = 400;
        }

        return response()->json(["status" => $status, "message" => $msg, "data" => $data], $statusCode);
    }

    public function addMarquee(Request $request)
    {
        if (Setting::get('app.access_only_for_users', false)) {
            $this->middleware('auth');
        }

        $getData = new marque;
        $getData->marque_text = $request->marqueeText;
        $saveQuery = $getData->save();

        if ($saveQuery) {
            $status = true;
            $msg = "Marquee Successfuly Saved.";
            $data = $getData;
            $statusCode = 200;
        } else {
            $status = false;
            $msg = "Marquee unsuccessfuly Saved.";
            $data = "N/A";
            $statusCode = 400;
        }

        return response()->json(["status" => $status, "message" => $msg, "data" => $data], $statusCode);
    }
}
