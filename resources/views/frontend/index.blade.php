@extends('frontend.layouts.auth')

@section('content')

<?php  $product_smarque = DB::select('select * from  lv_marques where id=11');
foreach($product_smarque as $sell)
    {
        $banner_img =  $sell->banner_img;
        $profile_imgds =  $sell->proflie_img;
        $profile_namess =  $sell->profile_names;
	}
?>

@if(Auth::user())
<style> main{ padding-top: 0px !important;}</style>
@else
<style> main{ padding-top: 80px !important;}</style>
@endif

<style>

    body{
        overflow: hidden;
    }

    .salesCounter{
        display: inline-block;
        width: 20px;
        height: 20px;
        line-height: 20px;
        text-align: center;
        border-radius: 20px 20px 20px 0px;
        font-size: 11px;
        opacity: 0.6;
        position: absolute;
        top: -12px;
        right: -15px !important;
        background: #3771fe;
    }

    footer{
        bottom: -15px !important;
    }

    .buyButton{
        border: 2px solid #0d6efd;
    }


    .buyButton:hover{
        border: 2px solid #0d6efd;
        background-color: transparent;
    }


    .afterDot::after{
        position: absolute;
        content: "";
        width: 3px;
        height: 3px;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -o-border-radius: 50%;
        -ms-border-radius: 50%;
        border-radius: 50%;
        right: -12%;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        transform: translateY(-50%);
        background-color: var(--tp-text-12);
    }
    .creator__area{
        margin-top:80px;
    }
</style>



    <!-- creator area start -->
    <section class="creator__area">
        <div class="creator__banners  tr67"


        @if(Auth::check())
            data-background="../../../assets/newdesign/assets/img/creator/<?php echo Auth::user()->cover?>"
        @else
            data-background="{{$banner_img}}"
        @endif



        style="padding-top: 185px;"></div>
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="creator__user-wrapper text-center">

                        <div class="creator__user-thumb">
                        @if(Auth::check())
                            @if(Auth::user()->photo != "")
                                <img src="../../../assets/newdesign/assets/img/creator/<?php echo Auth::user()->photo?>" alt="">
                            @else
                                <img src="{{$profile_imgds ?? ''}}" alt="">
                            @endif
                        @else
                            <img src="{{$profile_imgds ?? '' }}" alt="">
                        @endif
                           <?php  $marque = DB::select('select * from   lv_marques where status="1"');?>



            @if(count($marque) > 0)
                 <div class="marque__area">
                    <div class="container">
                        <div class="marque__inner p-relative">
                            <div class="row">
                                <div class="col-xxl-12">
                                    <div class="marque__wrapper">
                                        <div class="marque__slider">
                                            @foreach($marque as $value)
                                                <div class="marque__item ">
                                                    <p>{{$value->marque_text}}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
            @endif
                        </div>
                        <h3 class="creator__user-title">{{ $profile_namess ?? ''}} </h3>

                        <div class="creator__follow">
						<?php  $product_sale = DB::select('select * from  lv_products');?>

						    <h3 class="text-white creator__user-title shop_name mt-2" style="font-family: 'Be Vietnam Pro', sans-serif;"> {{Auth::user()->shop_name ?? 'My Shop'}}</h3>
                            <h5 style="color:#949cae; font-weight: 400; font-family: 'Be Vietnam Pro', sans-serif !important; font-size:13px;"><span>{{$sell->sells ?? ''}} </span>  <span style="position: relative;">&nbsp;<span class="salesCounterTest afterDot" style="color: #fff;">2 </span> Sales</span>&nbsp; <span  style="margin-left: 5px; color: #fff;">2</span> / <span style="color: #fff;">2 </span> Review</h5>

                        </div>

                          <!-- bid popup area end -->

         <!-- send message modal start -->
         <div class="message__modal report__modal modal fade" id="messagemodal" tabindex="-1" aria-labelledby="messagemodal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                  <div class="report__close">
                     <button type="button" class="report__close-btn" data-bs-dismiss="modal" aria-label="Close"><i class="fa-regular fa-xmark"></i></button>
                  </div>
                  <div class="report__wrapper">
                     <h3 class="report__title report__title-2">Send your message</h3>
                     <form action="#">
                        <div class="report__input-box">
                           <h4>Message</h4>
                        </div>
                        <div class="report__input">
                           <textarea placeholder="Write your message"></textarea>
                        </div>
                        <div class="report__button">
                           <button type="button" class="tp-btn-square">Send </button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!-- send message modal end -->
                        <div class="creator__tab">
                            <nav>
                                <div class="nav nav-tabs justify justify-content-center" id="nav-tab" role="tablist">
								<?php  $product=DB::select('select* from lv_products_categories');
								$total =  DB::select('select* from lv_products');
								$count = count($total);?>
                                <button class="nav-link" id="nav-sale-tab" data-bs-toggle="tab" onclick=getProducts(0) data-bs-target="#nav-sale" type="button" role="tab" aria-controls="nav-sale" aria-selected="true">All <span class="number">{{$count}}</span></button>

                                    @foreach($product as $products)
                                    @php
                                        $productCount=\App\Models\Product::where('category_id',$products->id)->count();
                                    @endphp
                                    <button class="nav-link" id="nav-sale-tab" onclick=getProducts({{$products->id}}) data-bs-toggle="tab" data-bs-target="#nav-sale" type="button" role="tab" aria-controls="nav-sale" aria-selected="true">{{ $products->name }}
                                        <span class="number">{{$productCount}}</span>
                                    </button>
                                            @endforeach()

                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="creator__border"></div>
      <div class="creator__item-wrapper pt-40 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade" id="nav-sale" role="tabpanel" aria-labelledby="nav-sale-tab">
                                <div class="create__sale">
                                    <div class="row" id="navSaleTab">
                                        <?php $data = \App\Models\Product::all(); // OLD: $data = DB::select("SELECT * FROM  lv_products"); ?>
                                            @foreach($data as $product)
                                                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                                                    <div class="nft__box theme-bg-dark mb-30 transition-3">
                                                        <div class="nft__box-thumb m-img mt-20 mb-20">
                                                        <a href="{{ route('product-page', $product->id) }}">

                                                            @if($product->thumbnail_image)
                                                                <img class="test" width="232" height="232" src="{{asset_dir('adminV2/assets/media/product/'.$product->thumbnail_image)}}" alt=""/>
                                                            @else
                                                                <img class="test" src="{{asset_dir('newdesign/assets/img/bid/2/bid-img-1.jpg')}}" alt=""/>
                                                            @endif
                                                        </a>
                                                        </div>
                                                        <div class="nft__box-content">
                                                        <div class="nft__box-content-top d-flex align-items-center justify-content-between">
                                                            <h3 class="nft__box-title">
                                                                <a href="{{ route('product-page', $product->id) }}">{{ $product->name }}</a>
                                                            </h3>
                                                            <div class="nft__box-trending-icon">
                                                                <span><i class="fa-brands fa-bitcoin" style="line-height: 1.8;"></i></span>
                                                            </div>
                                                        </div>
                                                        <div class="nft__box-info d-flex align-items-center justify-content-between">
                                                            <div class="nft__box-price">
                                                                <p>{{$product->getFormattedFrontPrice()}}</p>
                                                            </div>
                                                            <div class="nft__box-stock">
                                                                <p>{{$product->formatted_front_stock_status}}</p>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        @if($product->isAvailable())
                                                            <div class="nft__box-bottom d-flex align-items-center justify-content-between">
                                                                <div class="nft__box-highest">
                                                                    <p>
                                                                        <button type="submit" class="btn btn-icon btn-block btn-primary buyButton"  onclick="window.location.href='{{ route('product-page', $product->id) }}'">{{ __('frontend/v4.buybtn') }}</button>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
<script>
    window.addEventListener("load",(e)=>{
        let activeButton  = document.getElementById("nav-sale-tab");
        activeButton.click();
        })

    function getProducts(id){
            let activeTab  = document.getElementById("nav-sale");
            activeTab.classList.add('product-'+id);
             // Make an AJAX request to the Laravel route with the tabId
        $.ajax({
            url: '/products-tabs/' + id,
            type: 'GET',
            success: function(response) {
                $('#navSaleTab').empty();
               // Iterate over the response data using a foreach loop
                $.each(response, function(index, item) {
                    // console.log(item)
                    // Generate the HTML for each item
            var html = '';
               html +=  `<div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6"><div class="nft__box theme-bg-dark mb-30 transition-3"><div class="nft__box-thumb m-img mt-20 mb-20">`;
                    if(item.thumbnail_image) {
                        html +=  `<a href="../product/${item.id}"><img class="test" width='232' height='232' src="{{asset_dir('adminV2/assets/media/product/${item.thumbnail_image}')}}" alt=""></a></div><div class="nft__box-content">`;
                    }else {
                        html +=  `<a href="../product/${item.id}"><img class="test"src="{{asset_dir('newdesign/assets/img/bid/2/bid-img-1.jpg')}}" alt=""></a></div><div class="nft__box-content">`;
                    }

               html +=  `<div class="nft__box-content-top d-flex align-items-center justify-content-between"><h3 class="nft__box-title"><a href="../product/${item.id}">${item.name}</a></h3>`;
               html +=  `<div class="nft__box-trending-icon"><span><i class="fa-brands fa-bitcoin" style="line-height: 1.8;"></i></span></div></div><div class="nft__box-info d-flex align-items-center justify-content-between"><div class="nft__box-price"><p>${item.price_in_cent} €</p></div><div class="nft__box-stock"><p>${item.formatted_front_stock_status}</p></div></div></div>`;

               if (item.is_available) {
                   html +=  `<div class="nft__box-bottom d-flex align-items-center justify-content-between"><div class="nft__box-highest">`;
                   html +=  `<p><a type="submit" class="btn btn-icon btn-block btn-primary buyButton"  href="../product/${item.id}">{{ __('frontend/v4.buybtn') }}</a></p>`;
                   html +=  `</div></div>`;
               }

               html +=  `</div></div>`;
                      // Append the HTML to the tab content
                    $('#navSaleTab').append(html);
                });
                // Handle the received data
                // Update the content of the corresponding tab
               },
            error: function(xhr) {
                // Handle errors
            }
        });
    }
  </script>
@endsection

