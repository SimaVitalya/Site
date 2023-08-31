<?php

namespace App\Http\Middleware;

    use App\vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

    class TrimStrings extends Middleware
    {
        protected $except = [
            'password',
            'password_confirmation',
        ];
    }
