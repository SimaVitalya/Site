<?php

namespace App\Http\Middleware;

    use App\vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

    class VerifyCsrfToken extends Middleware
    {
        protected $addHttpCookie = true;

        protected $except = [
            'admin/api/*',
            'api/*',
            'ajax/*',
        ];
    }
