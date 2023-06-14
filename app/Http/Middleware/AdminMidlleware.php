<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMidlleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Проверяем, авторизован ли пользователь
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Проверяем, является ли пользователь администратором
        if (Auth::user()->isAdmin()) {
            return $next($request);
        }

        // Если пользователь не является администратором, то возвращаем 403 ошибку
        abort(403, 'Access denied');
    }
}
