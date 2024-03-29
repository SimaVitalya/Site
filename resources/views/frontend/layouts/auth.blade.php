<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>OpenFraudCart</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- theme style switch -->
      <meta name="theme-style-mode" content="1">

      <!-- Place favicon.ico in the root directory -->
      <link rel="shortcut icon" type="image/x-icon" href="@if(strlen(App\Models\Setting::get('theme.favicon')) > 0){{ App\Models\Setting::get('theme.favicon') }}@else{{ asset_dir('favicon.svg') }}@endif">

      <!-- CSS here -->
      <link rel="stylesheet" href="{{ asset_dir('newdesign/assets/css/bootstrap.css') }}">
      <link rel="stylesheet" href="{{asset_dir('newdesign/assets/css/meanmenu.css')}}">
      <link rel="stylesheet" href="{{asset_dir('newdesign/assets/css/animate.css')}}">
      <link rel="stylesheet" href="{{asset_dir('newdesign/assets/css/swiper-bundle.css')}}">
      <link rel="stylesheet" href="{{asset_dir('newdesign/assets/css/slick.css')}}">
      <link rel="stylesheet" href="{{asset_dir('newdesign/assets/css/backtotop.css')}}">
      <link rel="stylesheet" href="{{asset_dir('newdesign/assets/css/nouislider.css')}}">
      <link rel="stylesheet" href="{{asset_dir('newdesign/assets/css/magnific-popup.css')}}">
      <link rel="stylesheet" href="{{asset_dir('newdesign/assets/css/nice-select.css')}}">
      <link rel="stylesheet" href="{{asset_dir('newdesign/assets/css/font-awesome-pro.css')}}">
      <link rel="stylesheet" href="{{asset_dir('newdesign/assets/css/elegant-icon.css')}}">
      <link rel="stylesheet" href="{{asset_dir('newdesign/assets/css/spacing.css')}}">
      <link rel="stylesheet" href="{{asset_dir('newdesign/assets/css/style.css')}}">
      <style>
         .localelink img{
            width: 20px;
            height: 20px;
            border-radius: 50%;
         }
         .invalid-feedback{
            color: #721c24;
         }
         body {
             overflow: auto !important;
         }
         main {
             min-height: calc(100vh - 62px);
         }
         ul.list li {
            position: relative;
            padding-left: 35px !important;
        }
        .Deutsch:before,.English:before {
            left:12px !important;
        }
        .nice-select .current {
            padding-left:17px  !important;
        }
        .nice-select .current:before {
            left:10px  !important;
        }
        .wallet {
            margin-right: 15px;
            box-shadow: 0px 20px 30px rgba(3, 6, 31, 0.2);
            color: #a8b0c3;
            padding: 7px;
            background-color: #181c3b;
            box-sizing: border-box;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 5px;
        }
        .header__bg {
            background-color: var(--tp-theme-dark);
        }

        .share__modal-content .total_info-head{
            display: flex;
            align-items: center;
            margin-bottom: 35px;
        }
        .share__modal-content .total_info-head img{
          border-radius: 10px;
          width: 45%;
        }
        .total_info-name{
          width: 55%;
          text-align: right;
          margin-left: 15px;
        }
        .total_info-name h3{
          color: #fff;
          margin-bottom: 0;
        }
        .total_info-name span{
          color: #9b9b9b;
          font-size: 13px;
        }
        .total_info-amount{
          display: flex;
          margin-top: 35px;
        }
        .total_info-amount > div{
          width: 50%;
        }
        .total_info-amount h4{
          color: #fff;
          font-size: 12px;
        }
        .total_info-amount-total{
          text-align: left;
        }
        .total_info-amount-to_pay{
          text-align: right;
        }
        .total_info-descr p{
          line-height: 1.5;
        }

        @media (max-width: 768px) {
          .share__modal-content .total_info-head{
            flex-direction: column;
          }
          .share__modal-content .total_info-head img{
            width: 60%;
            margin-bottom: 25px;
          }
          .total_info-name{
            width: 100%;
            text-align: center;
            margin: 0;
          }
        }


      </style>
   </head>
   <body>
      <!-- pre loader area start -->
      <div id="loading">
         @include('frontend/common.loader')
      </div>
      <!-- pre loader area end -->

      <!-- back to top start -->
      <div class="progress-wrap">
         <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
         </svg>
      </div>
      <!-- back to top end -->


      <!-- header area start -->
      <header>
         @if(Auth::check())
            @php
               $class = 'header__area header__padding header__bg header__sticky';
            @endphp
         @else
            @php
               $class = 'header__area header__border header__padding header__bg header__sticky header__transparent';
            @endphp
         @endif
         <div id="header-sticky" class="header__area header__border header__padding header__bg header__sticky header__transparent">
            <div class="container tp-container">
               <div class="header__wrapper p-relative">
                  <div class="row align-items-center">
                    <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-6 col-4">
                      <div class="logo header__logo">
                        <a href="{{ url('/') }}">
                        @if(strlen(App\Models\Setting::get('theme.logo')) > 0)
                           <img src="{{ App\Models\Setting::get('theme.logo') }}" alt="logo" style="max-width: 200px;" />
                        @else
                           <img class="logo-white w-100" src="{{asset_dir('newdesign/assets/img/logo/logo.png')}}" alt="logo">
                        @endif
                        </a>
                      </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-5 d-none d-lg-block">
                       <div class="header__menu-wrapper d-flex align-items-center">
                         <!-- <div class="header__search mr-30 ml-5">
                            <form action="#">
                               <div class="header__search-input">
                                  <input type="text" placeholder="Search">
                                  <button type="submit" class="header__search-btn">
                                     <i class="fa-regular fa-magnifying-glass"></i>
                                  </button>
                               </div>
                            </form>
                         </div> -->
                         <div class="main-menu">
                            <nav id="mobile-menu">
                              <ul>
                                 <li class="">
                                    <a href="{{ url('/') }}">{{ __('frontend/main.home') }}</a>
                                    <!-- <ul class="submenu">
                                       <li><a href="index.html">Home Style 1</a></li>
                                       <li><a href="index-2.html">Home Style 2</a></li>
                                       <li><a href="index-3.html">Home Style 3</a></li>
                                    </ul> -->
                                 </li>
                                 <li class="">
                                    <a href="{{ route('shop') }}">{{ __('frontend/main.shop') }}</a>
                                 </li>
                                 <li class="">
                                    <a href="{{ route('faq') }}">{{ __('frontend/main.faq') }}</a>
                                 </li>

                                    @if(Auth::check())
                                      @if( Auth::user()->id == 1)
                                 <li><a href="http://public/admin" style="display: flex; align-items: center; gap: 5px;"> Admin Panel <i class="fa-solid fa-up-right-from-square" style="font-size: 12px;"></i></a></li>
                                 @endif
                                  @endif
                              </ul>
                            </nav>
                         </div>
                       </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-8">
                       <div class="header__right-wrapper d-flex justify-content-end align-items-center">
                        @if(Auth::check())
                       <div class="wallet">
					        <!--<i class="fa fa-wallet text-white"></i>-->
                            {{ Auth::user()->getFormattedBalance() }}
                        </div>
                        @endif
                       <div class="language">

                           <select name="" onchange="languageChange(this)">
                              @if(count(App\Models\Setting::getAvailableLocales()))
                                 @foreach(App\Models\Setting::getAvailableLocales() as $locale)
                                 @php
                                 if( \Lang::get('locale.name', [], $locale)  == "Deutsch"){
                                    $val = "/assets/svg/flags/017-germany 1.svg";
                                 }else{
                                    $val = "/assets/svg/flags/007-malasya.svg";
                                 }
                                 @endphp
                                    <option value="{{ route('language', $locale) }}" <?php if(app()->getLocale() == $locale){echo "selected";} ?>  data="{{ \Lang::get('locale.name', [], $locale) }}" data-id = "@php echo $val @endphp">{{ \Lang::get('locale.name', [], $locale) }}<img width = "50px" height = "50px" src = "@php echo  $val; @endphp"></option>
                                 @endforeach
                              @endif
                           </select>
                        </div>

                          <div class="header__right d-none d-sm-flex justify-content-end align-items-center">
                           @if(!Auth::check())
                              <div class="header__wallet ml-30">
                                 <a href="{{route('login')}}" class="header__wallet-btn" id="connectbtn">
                                    <svg viewBox="0 0 19 16">
                                       <path d="M17.5 5.83333V10.1667C17.5 13.5 15.9 14.5 13.5 14.5H5.5C2.5 14.5 1.5 13 1.5 10.1667V5.83333C1.5 3 2.5 2 4.852 1.552C5.06 1.51733 5.276 1.5 5.5 1.5H13.5C13.708 1.5 13.908 1.50866 14.1 1.54332C16.5 2 17.5 3 17.5 5.83333Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                       <path d="M9 5.03314H5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                       <path d="M17.2998 5.75061H14.8998C14.0198 5.75061 13.2998 6.65061 13.2998 7.75061C13.2998 8.85061 14.0198 9.75061 14.8998 9.75061H17.2998" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                       {{ __('frontend/user.login.title') }}
                                 </a>
                              </div>
                            @endif

                            @if(Auth::check())
                            <div class="header__wallet-wrapper" id="header__user">

                               <div class="header__user ml-10">
                                  <a href="javascript:void(0);">
                                     <img src="{{asset_dir('newdesign/assets/img/user/user123.jpg')}}" alt="">
                                  </a>
                                  <div class="wallet__dropdown tp-wallet-dropdown">
                                    <div class="wallet__dropdown-cover">
                                       <img src="{{asset_dir('newdesign/assets/img/user/user-cover.png')}}" alt="">
                                    </div>
                                    <div class="wallet__dropdown-top d-flex align-items-end">
                                       <div class="wallet__dropdown-user mr-15">
                                          <img src="{{asset_dir('newdesign/assets/img/user/user123.jpg')}}" alt="">
                                       </div>
                                       <div class="wallet__dropdown-user-content">
                                          <h4>{{ Auth::user()->username }}</h4>
                                       </div>
                                    </div>

                                    <div class="wallet__dropdown-action">
                                       <ul>
                                          <li>
                                             <a href="{{ route('home') }}"><i class="fa-regular fa-user"></i> Profile</a>
                                          </li>
                                          <li>
                                             <a href="{{route('orders')}}"><i class="fa-regular fa-ticket"></i> Orders</a>
                                          </li>
                                          <li>
                                             <a href="{{route('tickets')}}"><i class="fa-regular fa-bell"></i> Tickets</a>
                                          </li>
                                          <li>
                                             <a href="{{route('deposit')}}"><i class="fa-light fa-code-fork"></i> Deposit</a>
                                          </li>
                                          <li>
                                             <a href="{{ route('settings') }}"><i class="fa-regular fa-gear"></i> Settings</a>
                                          </li>
                                          <li>
                                             <a href="{{route('logout')}}"><i class="fa-regular fa-arrow-right-from-bracket"></i> Logout</a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                               </div>

                            </div>
                            @endif

                            <div class="header__user header__user-login ml-30" id="header__user-login">
                              <a href="javascript:void(0);">
                                 <img src="{{asset_dir('newdesign/assets/img/user/user-2.jpg')}}" alt="">
                              </a>

                              <div class="wallet__dropdown">
                                 <div class="wallet__dropdown-cover">
                                    <img src="{{asset_dir('newdesign/assets/img/user/user-cover.png')}}" alt="">
                                 </div>
                                 <div class="wallet__dropdown-top d-flex align-items-end">
                                    <div class="wallet__dropdown-user mr-15">
                                       <img src="{{asset_dir('newdesign/assets/img/user/user-2.jpg')}}" alt="">
                                    </div>
                                    <div class="wallet__dropdown-user-content">
                                       <h4>Robin Milford</h4>
                                    </div>
                                 </div>
                                 <div class="wallet__dropdown-id">
                                    <h5>Wallet:</h5>
                                    <p>0xF74d ... 12hf204
                                       <button type="button">
                                          <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M5.80388 13.2632H3.5941C1.28115 13.2632 0 11.9967 0 9.68638V3.57677C0 1.27497 1.27255 0 3.5941 0H7.52354C9.83649 0 11.1176 1.26642 11.1176 3.57677C11.1176 3.92761 10.8253 4.21854 10.4728 4.21854C10.1202 4.21854 9.8279 3.92761 9.8279 3.57677C9.8279 1.96808 9.14003 1.28353 7.52354 1.28353H3.5941C1.97762 1.28353 1.28975 1.96808 1.28975 3.57677V9.68638C1.28975 11.2951 1.97762 11.9796 3.5941 11.9796H5.80388C6.15641 11.9796 6.44875 12.2706 6.44875 12.6214C6.44875 12.9722 6.15641 13.2632 5.80388 13.2632Z" fill="#3771FE"/>
                                             <path d="M11.8705 14H9.54195C8.17131 14 7.41211 13.1959 7.41211 11.729V7.84992C7.41211 6.38846 8.16622 5.57895 9.54195 5.57895H11.8705C13.2411 5.57895 14.0003 6.38302 14.0003 7.84992V11.729C14.0003 13.1959 13.2462 14 11.8705 14ZM9.54195 6.39389C8.58403 6.39389 8.17641 6.82852 8.17641 7.84992V11.729C8.17641 12.7504 8.58403 13.1851 9.54195 13.1851H11.8705C12.8284 13.1851 13.236 12.7504 13.236 11.729V7.84992C13.236 6.82852 12.8284 6.39389 11.8705 6.39389H9.54195Z" fill="#3771FE" stroke="#3771FE" stroke-width="0.2"/>
                                          </svg>
                                       </button>
                                    </p>
                                 </div>
                                 <div class="wallet__dropdown-balance">
                                    <p>Balance: <span>0.075ETH</span></p>
                                 </div>
                                 <div class="wallet__dropdown-action">
                                    <ul>
                                       <li>
                                          <a href="javascript:void(0);"><i class="fa-regular fa-user"></i> Profile</a>
                                       </li>
                                       <li>
                                          <a href="javascript:void(0);"><i class="fa-regular fa-gear"></i> Settings</a>
                                       </li>
                                       <li>
                                          <a href="javascript:void(0);"><i class="fa-regular fa-arrow-right-from-bracket"></i> Logout</a>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                            </div>
                         </div>
                         <div class="header__bar ml-10 d-xl-none">
                            <button type="button" class="hamurger-btn" data-bs-toggle="modal" data-bs-target="#offcanvasmodal">
                               <span></span>
                               <span></span>
                               <span></span>
                            </button>
                         </div>
                       </div>
                    </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- header area end -->

      <!-- theme settings area start -->
      <div class="theme__settings transition-3">
         <div class="theme__settings-btn">
            <button type="button" class="theme__settings-expand" id="theme-setting-toggle"><i class="fa-solid fa-gear"></i></button>
            <button type="button" class="theme__settings-close" id="theme-setting-close"><i class="fa-regular fa-xmark"></i></button>
         </div>
         <div class="theme__settings-wrapper text-center">

            <div class="theme__switch mb-30">
               <h4 class="theme__settings-title">Select your desired theme</h4>
                  <!-- light dark moode switcher start -->
                  <div class="my_switcher setting-option">
                     <ul>
                        <li>
                           <a href="javascript: void(0);" data-theme="dark" class="setColor dark theme__switcher-btn">
                              <i class="fa-light fa-moon"></i> Dark
                           </a>
                        </li>
                        <li>
                           <a href="javascript: void(0);" data-theme="light" class="setColor light theme__switcher-btn">
                              <i class="fa-light fa-brightness-low"></i> Light
                           </a>
                        </li>
                     </ul>
                  </div>
               <!-- light dark moode switcher end -->
            </div>

            <div class="theme__settings-color">
               <h4 class="theme__settings-title">Select your favorite color</h4>

               <div class="theme__settings-color-input">
                  <input type="color" data-color="color" value="#3771FE">
               </div>
            </div>
         </div>
      </div>
      <!-- theme settings area end -->

      <!-- offcanvas area start -->
      <div class="offcanvas__area">
         <div class="modal fade" id="offcanvasmodal" tabindex="-1" aria-labelledby="offcanvasmodal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                   <div class="offcanvas__wrapper">
                      <div class="offcanvas__content">
                         <div class="offcanvas__top mb-40 d-flex justify-content-between align-items-center">
                            <div class="offcanvas__logo logo">
                               <a href="{{ url('/') }}">
                               <img src="{{asset_dir('newdesign/assets/img/logo/logo-black.png')}}" alt="logo">
                               </a>
                            </div>
                            <div class="offcanvas__close">
                               <button class="offcanvas__close-btn" data-bs-toggle="modal" data-bs-target="#offcanvasmodal">
                                  <i class="fal fa-times"></i>
                               </button>
                            </div>
                         </div>
                         <div class="offcanvas__search mb-25">
                            <form action="#">
                               <input type="text" placeholder="What are you searching for?">
                               <button type="submit" ><i class="far fa-search"></i></button>
                            </form>
                         </div>
                         <div class="mobile-menu fix mb-40"></div>
                         <div class="offcanvas__wallet mb-25 d-sm-none">
                           <a href="javascript:void(0);" class="offcanvas__wallet-btn">
                              <svg viewBox="0 0 19 16">
                                 <path d="M17.5 5.83333V10.1667C17.5 13.5 15.9 14.5 13.5 14.5H5.5C2.5 14.5 1.5 13 1.5 10.1667V5.83333C1.5 3 2.5 2 4.852 1.552C5.06 1.51733 5.276 1.5 5.5 1.5H13.5C13.708 1.5 13.908 1.50866 14.1 1.54332C16.5 2 17.5 3 17.5 5.83333Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M9 5.03314H5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M17.2998 5.75061H14.8998C14.0198 5.75061 13.2998 6.65061 13.2998 7.75061C13.2998 8.85061 14.0198 9.75061 14.8998 9.75061H17.2998" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg>
                              Wallet
                           </a>
                        </div>
                        <div class="offcanvas__notification d-sm-none d-flex align-items-center mb-25">
                           <div class="offcanvas__notification-icon mr-25">
                              <a href="javascript:void(0);">
                                 <i class="fa-light fa-bell"></i>
                                 <span class="notification-count">8</span>
                              </a>
                           </div>
                           <div class="offcanvas__notification-text">
                              <p>You have <span class="notification-number">8</span> notifications <a href="javascript:void(0);">view</a></p>
                           </div>
                        </div>
                         <div class="offcanvas__text d-none d-lg-block">
                            <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and will give you a complete account of the system and expound the actual teachings of the great explore</p>
                         </div>
                         <div class="offcanvas__map d-none d-lg-block mb-15">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29176.030811137334!2d90.3883827!3d23.924917699999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1605272373598!5m2!1sen!2sbd"></iframe>
                         </div>
                         <div class="offcanvas__contact mt-30 mb-20">
                            <h4>Contact Info</h4>
                            <ul>
                               <li class="d-flex align-items-center">
                                  <div class="offcanvas__contact-icon mr-15">
                                     <i class="fal fa-map-marker-alt"></i>
                                  </div>
                                  <div class="offcanvas__contact-text">
                                     <a target="_blank" href="https://www.google.com/maps/place/Dhaka/@23.7806207,90.3492859,12z/data=!3m1!4b1!4m5!3m4!1s0x3755b8b087026b81:0x8fa563bbdd5904c2!8m2!3d23.8104753!4d90.4119873">12/A, Mirnada City Tower, NYC</a>
                                  </div>
                               </li>
                               <li class="d-flex align-items-center">
                                  <div class="offcanvas__contact-icon mr-15">
                                     <i class="far fa-phone"></i>
                                  </div>
                                  <div class="offcanvas__contact-text">
                                     <a href="mailto:support@gmail.com">088889797697</a>
                                  </div>
                               </li>
                               <li class="d-flex align-items-center">
                                  <div class="offcanvas__contact-icon mr-15">
                                     <i class="fal fa-envelope"></i>
                                  </div>
                                  <div class="offcanvas__contact-text">
                                     <a href="tel:+012-345-6789">support@mail.com</a>
                                  </div>
                               </li>
                            </ul>
                         </div>
                         <div class="offcanvas__social">
                            <ul>
                               <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                               <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                               <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                               <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                         </div>
                      </div>
                   </div>
                </div>
            </div>
        </div>
      </div>
      <!-- offcanvas area end -->
      <div class="body-overlay"></div>
      <!-- offcanvas area end -->

      <main>
         @if(Request::segment(1) != '')
            <!-- breadcrumb area start -->
            @if(Request::segment(1) != 'home' && Request::segment(1) != 'ticket' && Request::segment(1) != 'tickets' && Request::segment(1) != 'settings' && Request::segment(1) != 'orders' && Request::segment(1) != 'transactions' && Request::segment(1) != 'deposit')

               @if(Request::segment(1) == 'faq' || Request::segment(1) == 'shop')
                  <section class="breadcrumb__area pt-70 pb-40 p-relative">
               @else
                  <section class="breadcrumb__area pt-160 pb-40 p-relative">
               @endif

                  <div class="breadrumb__shape">
                     <img class="breadcrumb__shape-1" src="{{asset_dir('newdesign/assets/img/breadcrumb/breadcrumb-shape-1.png')}}" alt="">
                  </div>
               </section>
               <!-- breadcrumb area end -->
               @yield('breadcrumb')
            @endif
         @endif

         @yield('content')

         <!-- share modal start -->
         <div class="share__modal modal fade" id="sharemodal" tabindex="-1" aria-labelledby="sharemodal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                  <div class="share__modal-content text-center">
                     <div class="share__nft-content">
                        <div class="share__thumb">
                           <img src="{{asset_dir('newdesign/assets/img/bid/bid-img-1.jpg')}}" alt="">
                        </div>

                     </div>
                     <div class="share__social">
                        <h3>Share this NFT</h3>
                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- share modal end -->

         <!-- report modal start -->
         <div class="report__modal modal fade" id="reportmodal" tabindex="-1" aria-labelledby="reportmodal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                  <div class="report__close">
                     <button type="button" class="report__close-btn" data-bs-dismiss="modal" aria-label="Close"><i class="fa-regular fa-xmark"></i></button>
                  </div>
                  <div class="report__wrapper">
                     <h3 class="report__title">Why are you reporting ?</h3>
                     <p>Describe briefly about your report.</p>
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
         <!-- report modal end -->

         <!-- bid popup area start -->
         <div class="bid__modal modal fade" id="bidmodal" tabindex="-1" aria-labelledby="bidmodal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                  <div class="bid__modal-close">
                     <button type="button" class="bid__modal-close-btn" data-bs-dismiss="modal" aria-label="Close"><i class="fa-regular fa-xmark"></i></button>
                  </div>
                  <div class="bid__modal">
                     <h3 class="bid__modal-title">Place your bid</h3>
                     <p>You are about to place bid on this product</p>

                     <div class="bid__modal-form">
                        <form action="#">
                           <div class="bid__modal-input">
                              <input type="text" placeholder="Enter your bid">
                              <span class="bid__modal-price">ETH</span>
                           </div>
                           <div class="bid__modal-info">
                              <p>Your Balance <span>254 ETH</span></p>
                              <p>Service fee <span>10 ETH</span></p>
                              <p>Total <span class="color-theme">264 ETH</span></p>
                           </div>
                           <div class="bid__modal-btn">
                              <button type="submit" class="tp-btn-3">Place bid</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- bid popup area end -->
      </main>

      <!-- footer area start -->
      <footer>
         <div class="footer__area footer__style-2 footer__gradient footer__overlay">
            <div class="footer__top">

            </div>
            <div class="footer__bottom">
               <div class="container">
                  <div class="row">
                     <div class="col-xxl-6 col-sm-6">
                        <div class="footer__copyright">
                           <p>© 2020 <a href="{{url('/')}}">{{ App\Models\Setting::get('app.name') }}</a>. All rights reserved.</p>
                        </div>
                     </div>
                     <div class="col-xxl-6 col-sm-6">
                        <div class="footer__menu text-sm-end">
                           {{-- <a href="#">Privacy Policy</a>
                           <a href="#">Terms & Conditions</a> --}}
                           <!-- @if(count(App\Models\Setting::getAvailableLocales()))

                              @foreach(App\Models\Setting::getAvailableLocales() as $locale)
                                 <a class="localelink @if($locale == app()->getLocale()) localelink-active @endif" href="{{ route('language', $locale) }}">
                                    <img class="flag-icon-img" src="{{ asset_dir('svg/flags/' . \Lang::get('locale.icon', [], $locale) . '.svg') }}" />
                                    <span class="flag-icon-name">{{ \Lang::get('locale.name', [], $locale) }}</span>
                                 </a>
                              @endforeach

                          @endif -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- footer area end -->


      <!-- JS here -->
      <script src="{{asset_dir('newdesign/assets/js/vendor/jquery.js')}}"></script>
      <script src="{{asset_dir('newdesign/assets/js/vendor/waypoints.js')}}"></script>
      <script src="{{asset_dir('newdesign/assets/js/bootstrap-bundle.js')}}"></script>
      <script src="{{asset_dir('newdesign/assets/js/cookie.js')}}"></script>
      <script src="{{asset_dir('newdesign/assets/js/style-switcher.js')}}"></script>
      <script src="{{asset_dir('newdesign/assets/js/meanmenu.js')}}"></script>
      <script src="{{asset_dir('newdesign/assets/js/swiper-bundle.js')}}"></script>
      <script src="{{asset_dir('newdesign/assets/js/slick.js')}}"></script>
      <script src="{{asset_dir('newdesign/assets/js/nouislider.min.js')}}"></script>
      <script src="{{asset_dir('newdesign/assets/js/countdown.js')}}"></script>
      <script src="{{asset_dir('newdesign/assets/js/magnific-popup.js')}}"></script>
      <script src="{{asset_dir('newdesign/assets/js/parallax.js')}}"></script>
      <script src="{{asset_dir('newdesign/assets/js/backtotop.js')}}"></script>
      <script src="{{asset_dir('newdesign/assets/js/nice-select.js')}}"></script>
      <script src="{{asset_dir('newdesign/assets/js/counterup.js')}}"></script>
      <script src="{{asset_dir('newdesign/assets/js/wow.js')}}"></script>
      <script src="{{asset_dir('newdesign/assets/js/isotope-pkgd.js')}}"></script>
      <script src="{{asset_dir('newdesign/assets/js/imagesloaded-pkgd.js')}}"></script>
      <script src="{{asset_dir('newdesign/assets/js/ajax-form.js')}}"></script>
      <script src="{{asset_dir('newdesign/assets/js/main.js')}}"></script>
      <script src="{{asset_dir('newdesign/assets/js/custom.js') }}"></script>
   </body>
</html>
