<?php

namespace App\Http\Controllers\Auth;

    use App\Http\Controllers\Controller;
    use App\vendor\laravel\framework\src\Illuminate\Foundation\Auth\SendsPasswordResetEmails;

    class ForgotPasswordController extends Controller
    {
        use SendsPasswordResetEmails;

        public function __construct()
        {
            $this->middleware('guest');
        }

        public function showLinkRequestForm()
        {
            return view('frontend.auth.passwords.email');
        }
    }
