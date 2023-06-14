@extends('frontend.layouts.auth')

@section('content')
<style>
   main{
      padding-top: 80px !important;
   }
</style>
	<!-- login area start -->
         <section class="login__area pb-5">
            <div class="container">
               <div class="row justify-content-center">
                  <div class="col-xxl-6 col-xl-6 col-lg-8">
                     <div class="login__wrapper">
                        <div class="login__shape">
                           <img class="login__shape-1" src="{{asset_dir('newdesign/assets/img/login/login-person.png')}}" alt="">
                           <img class="login__shape-2" src="{{asset_dir('newdesign/assets/img/login/login-shape-1.png')}}" alt="">
                           <img class="login__shape-3" src="{{asset_dir('newdesign/assets/img/login/login-shape-2.png')}}" alt="">
                           <img class="login__shape-4" src="{{asset_dir('newdesign/assets/img/login/login-shape-3.png')}}" alt="">
                        </div>
                        <div class="login__top text-center">
                           <h3>{{ __('frontend/user.register.title') }}</h3>
                           <p>Already have an account? <a href="{{ route('login') }}">{{ __('frontend/user.login.submit') }} </a></p>
                        </div>
                        <div class="login__form">
                           @if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
                           <form method="POST" id="register" action="{{ url('new/register') }}">
                        	@csrf
                              <div class="login__input-box">
                                 <div class="login__input-title">
                                    <h4>{{ __('frontend/user.username') }} <span>*</span></h4>
                                 </div>
                                 <div class="login__input">
                                    <input id="username" type="text" class="{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>
                                    <span class="login__input-icon">
                                       <i class="fa-solid fa-user"></i>
                                    </span>

                                    @if ($errors->has('username'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('username') }}</strong>
	                                    </span>
	                                @endif
                                 </div>
                              </div>

                              <div class="login__input-box">
                                 <div class="login__input-title">
                                    <h4>{{ __('frontend/user.jabber_id') }} <span>*</span></h4>
                                 </div>
                                 <div class="login__input">
                                    <input id="jabber_id" type="email" class="{{ $errors->has('jabber_id') ? ' is-invalid' : '' }}" name="jabber_id" value="{{ old('jabber_id') }}" required>
                                    <span class="login__input-icon">
                                       <i class="fa-light fa-envelope"></i>
                                    </span>

                                    @if ($errors->has('jabber_id'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('jabber_id') }}</strong>
	                                    </span>
	                                @endif
                                 </div>
                              </div>

                              <div class="login__input-box">
                                 <div class="login__input-title d-flex align-items-center justify-content-between">
                                    <h4>{{ __('frontend/user.register.password') }} <span>*</span></h4>
                                 </div>
                                 <div class="login__input">
                                    <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    <span class="login__input-icon">
                                       <i class="fa-light fa-lock"></i>
                                    </span>
                                    <span class="login__input-password-visible">
                                       <i class="fa-light fa-eye"></i>
                                    </span>
                                 </div>
                                 @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                              </div>

                              <div class="login__input-box">
                                 <div class="login__input-title d-flex align-items-center justify-content-between">
                                    <h4>{{ __('frontend/user.register.confirm_password') }} <span>*</span></h4>
                                 </div>
                                 <div class="login__input">
                                    <input id="password-confirm" type="password" class="" name="password_confirmation" required>
                                    <span class="login__input-icon">
                                       <i class="fa-light fa-lock"></i>
                                    </span>
                                    <span class="login__input-password-visible">
                                       <i class="fa-light fa-eye"></i>
                                    </span>
                                 </div>
                              </div>
                              
                              <div class="login__input-box">
                                 <div class="login__input-title d-flex align-items-center justify-content-between">
                                    <h4>{{ __('frontend/main.captcha') }} <span>*</span></h4>
                                 </div>
                                <div class="login__input" >
								 <!-- <div class="h-captcha {{ $errors->has('h-captcha-response') ? ' is-invalid' : '' }}"  data-sitekey="d390fcfa-170c-4545-be11-934dc671f001"></div> -->
                         <div class="h-captcha {{ $errors->has('h-captcha-response') ? ' is-invalid' : '' }}"  data-sitekey="057d878f-f757-4344-bb5c-38ef0bb4185e"></div>
								 </div>
                             	@if ($errors->has('h-captcha-response'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __('frontend/user.login.error_message') }}</strong>
                                    </span>
                                @endif
                              </div>
                              
                              <div class="login__btn mb-20">
                                 <button class="tp-btn-4 w-100">{{ __('frontend/user.register.submit') }}</button>
                              </div>
                              {{-- <div class="login__signup text-center">
                                 <p>Or <a href="login.html">Sing in</a> with email</p>
                              </div>
                              <div class="login__option-wrapper">
                                 <div class="login__option-item mb-15">
                                    <a href="#" class="login__option-btn w-100"><img src="assets/img/icon/google.png" alt=""> Continue with Google</a>
                                 </div>
                                 <div class="login__option-item">
                                    <a href="#" class="login__option-btn w-100"><img src="assets/img/icon/facebook.png" alt=""> Continue with Facebook</a>
                                 </div>
                              </div> --}}
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- login area end -->
@endsection

<script src="https://js.hcaptcha.com/1/api.js" async defer></script>