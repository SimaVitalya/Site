<?php

namespace App\Http\Controllers\Auth;

    use App\Http\Controllers\Controller;
    use App\vendor\laravel\framework\src\Illuminate\Foundation\Auth\VerifiesEmails;

    class VerificationController extends Controller
    {
        use VerifiesEmails;

        protected $redirectTo = '/home';

        public function __construct()
        {
            $this->middleware('auth');
            $this->middleware('signed')->only('verify');
            $this->middleware('throttle:6,1')->only('verify', 'resend');
        }
    }
