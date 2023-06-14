<?php
//
//namespace App\Http\Controllers\Backend;
//
//use App\Http\Controllers\Controller;
//use App\Models\UserOrder;
//use App\Models\UserTicket;
//use App\UseCases\DashboardService;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
//
//
//class DashboardController extends Controller
//{
//
//    private $service;
//
//    public function __construct(DashboardService $service)
//    {
//        // $this->middleware('backend');
//        $this->service = $service;
//    }
//
//    public function showDashboard()
//    {
//        extract($this->service->getDashboardData());
//        $userOrders = UserOrder::whereHas('product')->with('product')->groupBy('product_id')->select('product_id', DB::raw('sum(totalprice) as totalprice'))->OrderBy('totalprice', 'desc')->limit(5)->get();
//        return view('backendV2.dashboard', compact("data", "counts", 'userOrders'));
//    }
//
//    public function showDashboardV2()
//    {
//        extract($this->service->getDashboardData());
//        $userOrders = UserOrder::whereHas('product')->with('product')->groupBy('product_id')->select('product_id', DB::raw('sum(totalprice) as totalprice'))->OrderBy('totalprice', 'desc')->limit(5)->get();
//        return view('backendV2.dashboard', compact("data", "counts", 'userOrders'));
//    }
//
//    public function changeStatus(Request $request)
//    {
//        UserTicket::where('id', $request->get('ticket'))->update(['status' => $request->get('status')]);
//    }
//}
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\UserOrder;
use App\Models\UserTicket;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    //    public function showDashboard()
    //    {
    //        $products = Product::select("created_at", "id")->get();
    //        $tickets = UserTicket::where('status', 'open')->get();
    //
    //        $orders = UserOrder::select("created_at", "id")->get();
    //        $counts = $this->getCounts($products, $tickets);
    //
    //
    //        $data = [
    //            'products' => $this->getProductsChartData($products),
    //            'orders' => $this->getOrdersChartData($orders),
    //            'tickets' => $this->getTicketsChartData($tickets),
    //        ];
    //
    //        $userOrders = UserOrder::whereHas('product')->with('product')->groupBy('product_id')->select('product_id',
    //            DB::raw('sum(totalprice) as totalprice'))->orderBy('totalprice', 'desc')->limit(5)->get();
    //        return view('backendV2.dashboard', compact("data", "counts", 'userOrders'));
    //    }
    //
    //    protected function getCounts($products, $tickets)
    //    {
    //        return [
    //            "ticketsCount" => $tickets->count(),
    //            "productsCount" => $products->count(),
    //            "profitCount" => UserOrder::getFormattedTodayWin(),
    //        ];
    //    }
    //
    //    protected function getProductsChartData($products)
    //    {
    //        $data = [];
    //        foreach ($products->groupBy(function($item) {
    //            return optional($item->created_at)->format('Y-m-d');
    //        }) as $date => $productGroup) {
    //            $data["dates"][] = $date;
    //            $data["counts"][] = count($productGroup);
    //        }
    //        return $data;
    //    }
    //
    //    protected function getOrdersChartData($orders)
    //    {
    //        $data = [];
    //        foreach ($orders->groupBy(function($item) {
    //            return optional($item->created_at)->format('Y-m-d');
    //        }) as $date => $orderGroup) {
    //            $data["dates"][] = $date;
    //            $data["counts"][] = count($orderGroup);
    //        }
    //        return $data;
    //    }
    //
    //    protected function getTicketsChartData($tickets)
    //    {
    //        $data = [];
    //        foreach ($tickets->groupBy(function($item) {
    //            return optional($item->created_at)->format('Y-m-d');
    //        }) as $date => $ticketGroup) {
    //            $data["dates"][] = $date;
    //            $data["counts"][] = count($ticketGroup);
    //        }
    //        return $data;
    //    }
    //
    //    public function changeStatus(Request $request)
    //    {
    //        UserTicket::where('id', $request->get('ticket'))->update(['status' => $request->get('status')]);
    //    }
    //}
    public function showDashboard()
    {
        $products = Product::select("created_at", "id")->get();
        $tickets = UserTicket::where('status', 'open')->get();
        $orders = UserOrder::select("created_at", "id")->get();

        $data = [
            'products' => $this->getChartData($products, 'Product'),
            'orders' => $this->getChartData($orders, 'Order'),
            'tickets' => $this->getChartData($tickets, 'Ticket'),
        ];

        $counts = [
            "ticketsCount" => $tickets->count(),
            "productsCount" => $products->count(),
            "profitCount" => UserOrder::getFormattedTodayWin(),
        ];

        $userOrders = UserOrder::with('product')->select('product_id',
                DB::raw('sum(totalprice) as totalprice'))->groupBy('product_id')->orderByDesc('totalprice')->limit(5)->get();

        return view('backendV2.dashboard', compact("data", "counts", 'userOrders'));
    }

    protected function getChartData($items, $itemName)
    {
        $data = [
            'dates' => [],
            'counts' => [],
        ];

        $groups = $items->groupBy(function ($item) {
            if ($item->created_at === null) {
                return null;
            }
            return $item->created_at->format('Y-m-d');
        });

        foreach ($groups as $date => $group) {
            $data['dates'][] = $date;
            $data['counts'][] = $group->count();
        }

        return $data;
    }

    public function changeStatus(Request $request)
    {
        UserTicket::where('id', $request->input('ticket'))->update(['status' => $request->input('status')]);
    }
}
