@extends('frontend.layouts.auth')

@section('content')
<style>

    .product__sold_number{
        color:#3771fe !important;
    }
    .product__details-bid-status {
        flex:0 0 50% !important;
    }
    .product__details-bid-status::after {
        right:4px !important;
    }
    .product__details-info-btn {
        display:flex;
        justify-content:space-between;
        align-items:center;
    }
    .product__details-info-btn .tp-btn-2 {
        flex:0 0 auto;
    }
    .product__details-creator-thumb.verified::after {
        color:#3771fe !important;
    }
    .tp-btn-2 {
        border-radius:0.25rem !important;
    }
    .sold-out-label {
        margin-top: 20px;
    }
</style>

    <section class="product__details-area pt-80 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xxl-7 col-xl-6 col-lg-6">
                    <div class="product__details-thumb-tab d-sm-flex align-items-start">
                         <div class="product__details-thumb-content">
                            <div class="tab-content" id="nav-tabContent">
{{--                                <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-1-tab">--}}
{{--                                    @if($product->thumbnail_image)--}}
{{--                                        <img class="test" width="485" height="485" src="{{asset_dir('adminV2/assets/media/product/'.$product->thumbnail_image)}}" alt=""/>--}}
{{--                                    @else--}}
{{--                                        <img width="485" height="485" src="{{asset_dir('newdesign/assets/img/product/tab/product-tab-big-0.jpg')}}" alt=""/>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
                                <div class="tab-pane fade show active" id="nav-1" role="tabpanel"       aria-labelledby="nav-1-tab">
                                    @if($product->thumbnail_image)
                                        <img class="test" width="232" height="232" src="{{ asset_dir('adminV2/assets/media/product/'.$product->thumbnail_image) }}" alt="" onerror="this.onerror=null;this.src='{{ asset_dir('newdesign/assets/img/bid/2/bid-img-2.jpg') }}';"/>
                                    @else
                                        <img class="test" src="{{asset_dir('newdesign/assets/img/bid/2/bid-img-1.jpg')}}" alt=""/>
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-2-tab">
                                    <img src="../../../assets/newdesign/assets/img/product/tab/product-tab-big-2.jpg" alt=""/>
                                </div>
                                <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-3-tab">
                                    <img src="../../../assets/newdesign/assets/img/product/tab/product-tab-big-3.jpg" alt=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-5 col-xl-6 col-lg-6">
                    <div class="product__details-wrapper">
                        <h3 class="product__details-title">{{ $product->name }} </h3>
                        <?php  $product_sell = DB::select('select * from  lv_users_orders where status="completed"');?>
                        <div class="product__details-bid-info">
                            <!-- <p>From <span>0.44 €</span></p> -->
{{--                            <p>@lang('frontend/shop.product_page.product_sold_amount', ['amount' => count($product_sell)])</p>--}}
                        </div>


                        <div class="product__details-info d-sm-flex align-items-center justify-content-between">
                            <div class="product__details-info-item mb-30 mt-5">
                                <p>Seller</p>
                                <div class="product__details-creator d-flex align-items-center">
                                    <div class="product__details-creator-thumb verified mr-10">
                                        <a href="#">
                                             @if(Auth::check())
                                @if(Auth::user()->photo != "")
                                    <img src="../../../assets/newdesign/assets/img/creator/<?php echo Auth::user()->photo?>" alt="">
                                @else
                                    <img src="{{$profile_imgds ?? ''}}" alt="">
                                @endif
                            @else
                                <img src="{{$profile_imgds ?? '' }}" alt="">
                            @endif
                            </a>
                                    </div>
                                    <div class="product__details-creator-content">
                                        <h3>
                                            <a href="#">{{Auth::user()->shop_name ?? 'My Shop'}}</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="product__details-info">
                            <div class="product__details-info-top">
                                <div class="product__details-info-tab">
                                    <nav>
                                        <div class="nav nav-tabs" id="product-nav-tab" role="tablist">
                                            <span class="nav-link active" id="nav-details-tab">@lang('frontend/shop.product_page.description')</span>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                            <div class="product__details-info-tab-content">
                                <div class="tab-content" id="product-details">
                                    <div class="tab-pane fade show active" id="nav-details" role="tabpanel" aria-labelledby="nav-details-tab">
                                        <div class="product__details-tab-item">
                                            <div class="product__details-info-item mb-25">
                                                <p>{{$metaDESC}}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="product__details-info-bottom ">
                                <div class="product__details-bid d-sm-flex align-content-center justify-content-between">
                                    <div class="product__details-bid-status mb-15">
                                        <p>@lang('frontend/shop.product_page.price')</p>
{{--                                        <h4>{{$amount}} €</h4>--}}
                                        <h4>{{$product->getFormattedFrontPrice()}}</h4>
                                    </div>
                                    <div class="product__details-bid-countdown mb-15">
                                        <!-- <div class="product-bid-countdown d-flex align-items-center" data-countdown="2024/01/01"></div> -->

                                        @if($product->is_available)
                                            <h3 class="text-white">@lang('frontend/shop.product_page.quantity')</h3>
                                        @else
                                            <h3 class="text-white sold-out-label">{{$product->formatted_front_stock_status}}</h3>
                                        @endif
                                    </div>
                                </div>
{{--                                {{url('checkout')}}--}}
                                <form id="oneClickCheckout" action="{{ url('buy-one-click') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="product_name" value="{{ $product->name }}">
                                    <input type="hidden" name="product_amount" value="{{ $amount }}">
                                    <input type="hidden" name="product_amount_in_cents" value="{{ $product->price_in_cent }}">
                                    <div class="product__details-info-btn" style="">
                                        @if($product->is_available)
{{--                                            <button type="submit" class="tp-btn-2 active" onclick="return confirm('Are you sure you want to Buy this product?');" data-toggle="modal" data-target="#buyNowModal">Buy Now</button>--}}

                                            <button type="button" class="tp-btn-2 active" data-bs-toggle="modal" data-bs-target="#buyNowModal" onclick=prepareProductPriceByQty() >
                                                @lang('frontend/shop.product_page.buy_now_btn')
                                            </button>

                                            <div class="qty">
                                                <div class="btns d-flex justify-content-end" style="gap: 15px;">
                                                    <button type="button" class="btn btn-sm btn-primary" style="border-radius: unset;" onclick="quantityMinus()">-</button>
                                                    <input type="number" id="productQty" class="form-control quantityValue" name="qty" style="width: 30%" style="border-radius: unset;" value="1">
                                                    <button type="button" class="btn btn-sm btn-primary" style="border-radius: unset;" onclick="quantityPlus()">+</button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Modal -->
<div class="share__modal modal fade" id="buyNowModal" tabindex="-1" aria-labelledby="buyNowModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="share__modal-content text-center">

                <!-- pre loader area start -->
{{--                <div id="modal-loading">--}}
{{--                    @include('frontend.common.loader')--}}
{{--                </div>--}}
                <!-- pre loader area end -->

                <div class="total_info-head">
                    <img src="{{asset_dir('newdesign/assets/img/bid/2/bid-img-1.jpg')}}" alt=""/>

                    <div class="total_info-name">
                        <h3>{{ $product->name }}</h3>
                        <span>@lang('frontend/shop.product_page.product_sold_amount', ['amount' => count($product_sell)])</span>
{{--                        {{$amount}}--}}
                        <div class="total_info-amount">
                            <div class="total_info-amount-total">
                                <h4>@lang('frontend/shop.product_page.total'):</h4>
                                <span></span>
                            </div>

                            <div class="total_info-amount-to_pay">
                                <h4>@lang('frontend/shop.product_page.amount_to_pay'):</h4>
                                <span></span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="total_info-descr">
                    <p>{{$metaDESC}}</p>
                </div>

                <div class="total_info-btn">
                    <input type="submit" value="@lang('frontend/shop.product_page.confirm_order')" onclick="submitForm()" class="btn btn-primary"/>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function quantityPlus(){
        let qty = document.querySelector(".quantityValue");
        count = qty.value;
        count++;
        qty.value = count;
    }

    function quantityMinus(){
        let qty = document.querySelector(".quantityValue");
        count = qty.value;
        count--;
        let finalQty = count <= 0 ? "0" : count;
        qty.value = finalQty;
    }

    function prepareProductPriceByQty(){
        let currency = '€';
        let qty = document.querySelector(".quantityValue");
        let priceInCents = document.querySelector("input[name='product_amount_in_cents']");

        let totalElem = document.querySelector(".total_info-amount-total span");
        let amountToPayElem = document.querySelector(".total_info-amount-to_pay span");

        totalElem.innerHTML = `${qty.value} x ${priceInCents.value } ${currency}`;
        amountToPayElem.innerHTML = `${(qty.value * priceInCents.value)} ${currency}`;
    }

    function submitForm() {
        document.getElementById("oneClickCheckout").submit();
    }
</script>
@endsection

