<?php

namespace App\Http\Middleware;

    use App\vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

    class PreventRequestsDuringMaintenance extends Middleware
    {
        protected $except = [];
    }
