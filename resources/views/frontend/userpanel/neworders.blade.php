@extends('frontend.layouts.auth')

@section('content')
<style>
	.activity__others ul{
		border: 1px solid rgba(255, 255, 255, 0.08);
		box-shadow: 0px 1px 2px rgba(4, 18, 38, 0.1);
		border-radius: 10px;
		background-color: rgba(255, 255, 255, 0.04);
	}
	.activity__others ul li,.activity__others ul li p{
		background: transparent;
		color: #fff;
		border: none;
	}
	nav{
		text-align: center;
	}
	ul.pagination{
		display: inline-flex;
	}
	.page-item.disabled .page-link {
	    background-color :#05092b !important;
	    border-color:#212543 !important;
	}
	.page-link {
	   background-color :#0f1333 !important;
	   border: 1px solid #212543 !important;
	   color: #a1a8bc !important;
	}
	.page-item.active .page-link {
	    color:#ffffff !important;
	    background-color: #3771fe !important;
	}

	.page-item .page-link:focus {
	    box-shadow:none !important;
	    outline:none !important;

	}

</style>
<section class="blog__area pb-100 pt-100">
	<div class="edit__profile ">
       <div class="container-fluid fix p-0">
          <div class="row">
             <div class="col-xxl-12">
                <div class="profile__cover-wrapper p-relative">
                   <div class="profile__cover w-img tp-img-cover">
                     @if(Auth::user()->cover != "")
                        <img src="/assets/newdesign/assets/img/creator/<?= Auth::user()->cover ?>" alt="">
                     @elseif(Auth::user()->cover == "")
                        <img src="{{asset_dir('newdesign/assets/img/creator/creator-bg-2.jpg')}}" alt="">
                     @endif
                   </div>
                   <div class="profile__cover-edit">
                     <form action="{{ url('update/cover-photo') }}" method="post" id="formCoverData" enctype="multipart/form-data">
                        @csrf
                        <input id="profile-cover-input" class="cover-img-popup" type="file" name="coverFile">
                     </form>

                      <label for="profile-cover-input"><i class="fa-regular fa-pen-to-square"></i></label>
                   </div>
                </div>
             </div>
          </div>
          <div class="row">
             <div class="col-xxl-12">
                <div class="profile__thumb-wrapper  text-center">
                   <div class="profile__thumb text-center tp-img-profile d-inline-block p-relative">
                        @if(Auth::user()->photo != "")
                           <img src="/assets/newdesign/assets/img/creator/<?= Auth::user()->photo ?>" alt="">
                        @elseif(Auth::user()->photo == "")
                           <img src="{{asset_dir('newdesign/assets/img/creator/user-1.jpg')}}" alt="">
                        @endif
                      <div class="profile__thumb-edit">
                         <form action="{{ url('update/photo') }}" method="post" id="formData" enctype="multipart/form-data">
                           @csrf
                           <input id="profile-thumb-input" class="profile-img-popup photo-file" name="photoFile" type="file">
                         </form>

                         <label for="profile-thumb-input"><i class="fa-regular fa-camera"></i></label>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
	<div class="container">
		<div class="row">
			@include('frontend.common.frontmenu')
			<div class="col-xxl-8 col-xl-8 col-lg-8">
				<div class="blog__wrapper" style="padding-top: 0px;">
					<article class="postbox__item format-image mb-40 transition-3">
						<div class="blog__grid-tag">
	                      <a href="javascript:void(0);">{{ __('frontend/user.orders') }}</a>
	                    </div>
					</article>

					@if(count($user_orders))
					<div class="postbox__comment-form">
               			<h3 class="postbox__comment-form-title">{{ __('frontend/user.orders') }}</h3>

               			@foreach($user_orders as $order)

	               			<div class="activity__wrapper mr-60">
	               				<div class="activity__item d-md-flex align-items-center justify-content-between mb-10">
		                           <div class="activity__item-inner d-flex align-items-center">
		                              <div class="activity__thumb mr-20">
		                                 <a href="/product/{{$order->product_id}}">
		                                    <img src="{{ asset_dir('newdesign/assets/img/activity/user-1.jpg')}}" alt="">
		                                 </a>
		                                 <span class="activity__tag">
		                                   <svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
		                                    <path d="M10.6691 6.54838L6.55412 10.6634C6.44752 10.7701 6.32092 10.8547 6.18158 10.9125C6.04223 10.9703 5.89287 11 5.74203 11C5.59119 11 5.44182 10.9703 5.30248 10.9125C5.16313 10.8547 5.03654 10.7701 4.92994 10.6634L0 5.73916V0H5.73916L10.6691 4.92994C10.8829 5.145 11.0029 5.43592 11.0029 5.73916C11.0029 6.0424 10.8829 6.33332 10.6691 6.54838Z" fill="white"></path>
		                                    <path d="M2.86914 2.8696H2.87542" stroke="#006EED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
		                                    </svg>
		                                 </span>
		                              </div>
		                              <div class="activity__content">
		                                 <h3 class="activity__title">
		                                    <a href="/product/{{$order->product_id}}"><strong>#{{ $order->id }}</strong> {{ $order->name }}</a>

		                                 </h3>

		                                 <p>
		                                 	@forelse (explode('\r\n\r\n', $order->content) as $content){!! e(strlen($content) ? str_replace(' |  | ', ' | ', preg_replace('#(\r\n|\r|\n)#',' | ',trim(($content)))) . PHP_EOL . '---------' . PHP_EOL : '') !!}@empty N/A @endforelse
		                                 </p>
		                              </div>
		                           </div>

		                           <div class="activity__status">
		                              <p>{{ __('frontend/shop.price') }} {{ $order->getFormattedPrice() }}</p>
		                           </div>




		                        </div>

{{--                                нужный код--}}

		                        <div class="activity__others">
		                              <ul class="list-group list-group-flush">
                                    @if($order->product)
                                    <li class="list-group-item list-group-item-1">
                                        <b>{{ __('frontend/shop.order_product') }}</b> {{ $order->product->name }}
                                    </li>
                                    @endif

                                    @if($order->getAmount() > 1)
                                    <li class="list-group-item list-group-item-2">
                                        <b>{{ __('frontend/shop.order_amount') }}</b> {{ $order->getAmount() }}
                                    </li>
                                    @endif

                                    <li class="list-group-item list-group-item-3">
                                        <b>{{ __('frontend/shop.price') }}</b> {{ $order->getFormattedPrice() }}
                                    </li>

                                    @if($order->delivery_price > 0)
                                    <li class="list-group-item list-group-item-4">
                                        <b>{{ __('frontend/shop.delivery_price') }}</b> {{ $order->getFormattedDeliveryPrice() }}
                                    </li>
                                    @endif

                                    @if($order->asWeight())
                                    <li class="list-group-item list-group-item-5">
                                        <b>{{ __('frontend/shop.bought_weight') }}</b> {{ $order->getWeight() . $order->getWeightChar() }}
                                    </li>
                                    @endif

                                    <li class="list-group-item list-group-item-6">
                                        <b>{{ __('frontend/shop.totalprice') }}</b> {{ $order->getFormattedTotalPrice() }}
                                    </li>

                                    @if(strlen($order->delivery_method) > 0)
                                    <li class="list-group-item list-group-item-7">
                                        <b>{{ __('frontend/shop.delivery_method.title') }}</b>
                                        {{ $order->delivery_method }}
                                    </li>
                                    @endif

                                    @if(strlen($order->getDrop()) > 0)
                                    <li class="list-group-item list-group-item-8">
                                        <b>{{ __('frontend/shop.orders_order_note') }}</b><br />
                                        <p style="margin-top: 8px">

                                        {{ Illuminate\Support\Facades\Crypt::decryptString($order->getDrop()) }}

                                        </p>
                                    </li>
                                    @endif

                                    @if($order->getStatus() != 'nothing')
                                    <li class="list-group-item list-group-item-9">
                                        <b>{{ __('frontend/shop.orders_status') }}</b>
                                        @if($order->getStatus() == 'cancelled')
											{{ __('frontend/shop.orders.status.cancelled') }}
									    @elseif($order->getStatus() == 'completed')
									        {{ __('frontend/shop.orders.status.completed') }}
										@elseif($order->getStatus() == 'pending')
											{{ __('frontend/shop.orders.status.pending') }}
										@endif
                                    </li>
                                    @endif

                                    @if($order->hasNotes())
                                    <li class="list-group-item list-group-item-10">
                                        <b>{{ __('frontend/shop.orders_notes') }}</b>
                                    </li>

                                    @foreach($order->getNotes() as $note)
                                    <li class="list-group-item list-group-item-11 list-group-order-note">
                                        {{ strlen($note->note) > 0 ? (Illuminate\Support\Facades\Crypt::decryptString($note->note)) : '' }}

                                        <br/>
                                        <span>{{ $note->getDateTime() }}</span>
                                    </li>
                                    @endforeach
                                    @endif

                                    <li class="list-group-item list-group-item-12">
                                        <b>{{ __('frontend/user.date') }}</b> {{ $order->created_at->format('d.m.Y') }}
                                    </li>
                                </ul>
		                           </div>
                                {{--                                нужный код--}}





                            </div>
               			@endforeach

               		</div>
               		{!! preg_replace('/' . $user_orders->currentPage() . '\?page=/', '', $user_orders->links()) !!}
               		@else
               		<div class="alert alert-warning">
	                    {{ __('frontend/user.orders_page.no_orders_exists') }}
	                </div>
               		@endif

				</div>
			</div>
		</div>
	</div>
</section>
<script src="{{ url('./assets/newdesign/assets/js/custom.js') }}"></script>

@endsection
