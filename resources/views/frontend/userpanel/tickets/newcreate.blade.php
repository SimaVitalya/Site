@extends('frontend.layouts.auth')

@section('content')


<style>
	.nice-select{
		width: 100% !important;
	}
    .postbox__comment-input .nice-select .list .option {
	    color: #fff !important;
	}
</style>
	<section class="blog__area pt-0 pb-100">
		<div class="container">
			<div class="row">
				<div class="col-xxl-12 col-xl-12 col-lg-12">
					<div class="blog__wrapper">
						<article class="postbox__item format-image mb-40 transition-3">
							<div class="blog__grid-tag">
		                      <a href="javascript:void(0);">{{ __('frontend/user.tickets.ticket_create') }} </a>
		                    </div>
						</article>

						@if (Session::has('errorMessage'))
					        <div class="container">
								<div class="row justify-content-center">
									<div class="col-md-12">
										<div class="alert alert-success alert-dismissible fade show" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="{{ __('frontend/main.close') }}">
												<span aria-hidden="true">×</span>
											</button>

											{!! \Session::get('errorMessage') !!}
										</div>
									</div>
								</div>
							</div>
					    @endif

						<div class="postbox__comment-form">
                   			<h3 class="postbox__comment-form-title">{{ __('frontend/user.tickets.ticket_create') }}</h3>
                   			<form method="POST" action="{{ route('ticket-create') }}">
								@csrf

								<div class="col-xxl-12 col-xl-12 col-lg-12">
		                            <div class="postbox__comment-input-box">
		                                <h4>{{ __('frontend/user.tickets.subject') }} <span>*</span></h4>
		                                <div class="postbox__comment-input">
			                               	<input class="{{ $errors->has('subject') ? ' is-invalid' : '' }}" value="{{ old('subject') }}" name="subject" id="subject" required autofocus />

											@if ($errors->has('subject'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('subject') }}</strong>
												</span>
											@endif
		                                </div>
		                            </div>
		                         </div>

		                         <div class="col-xxl-12 col-xl-12 col-lg-12">
		                            <div class="postbox__comment-input-box">
		                                <h4>{{ __('frontend/user.tickets.category') }} <span>*</span></h4>
		                                <div class="postbox__comment-input">
			                               	<select class="{{ $errors->has('ticket_category') ? ' is-invalid' : '' }} custom_select" name="ticket_category" id="ticket_category">
												<option value="0">{{ __('frontend/main.please_choose') }}</option>
												@foreach(\App\Models\UserTicketCategory::orderBy('name')->get() as $userTicketCategory)
												<option value="{{ $userTicketCategory->id }}" @if(old('ticket_category') == $userTicketCategory->id) selected @endif>{{ \App\Classes\LangHelper::getValue(app()->getLocale(), 'ticket-category', null, $userTicketCategory->id) ?? $userTicketCategory->name }}</option>
												@endforeach
											</select>

											@if ($errors->has('ticket_category'))
			                                    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $errors->first('ticket_category') }}</strong>
			                                    </span>
			                                @endif
		                                </div>
		                            </div>
		                         </div>

		                         <div class="col-xxl-12">
		                            <div class="postbox__comment-input-box">
		                               <h4>{{ __('frontend/user.tickets.message') }}</h4>
		                               <div class="postbox__comment-input">
		                                  {{-- <textarea placeholder="Your comment here..."></textarea> --}}
		                                  <textarea class="{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message" id="message" rows="3" required>{{ old('message') }}</textarea>
		                               </div>
		                               	@if ($errors->has('message'))
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $errors->first('message') }}</strong>
		                                    </span>
		                                @endif
		                            </div>
		                         </div>

		                      <div class="login__input-box">
                                 <div class="login__input-title d-flex align-items-center justify-content-between">
                                    <h4>{{ __('frontend/main.captcha') }} <span>*</span></h4>
                                 </div>
                                <div class="login__input" >
								 <div class="h-captcha {{ $errors->has('h-captcha-response') ? ' is-invalid' : '' }}"  data-sitekey="d390fcfa-170c-4545-be11-934dc671f001"></div>
								 </div>
                             	@if ($errors->has('h-captcha-response'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __('frontend/user.login.error_message') }}</strong>
                                    </span>
                                @endif
                              </div>


		                         <div class="col-xxl-12">
		                            <div class="postbox__comment-btn">
		                               <button type="submit" class="tp-btn-4 w-100">{{ __('frontend/user.tickets.create_button') }}</button>
		                            </div>
		                         </div>
							</form>
                   		</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<script src="https://js.hcaptcha.com/1/api.js" async defer></script>
@endsection