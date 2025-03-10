<?php

namespace Modules\Language\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLangMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('set_lang')) {
            app()->setLocale(session('set_lang'));
        } else {
            app()->setLocale(config('templatecookie.default_language'));
        }

        return $next($request);
    }
}
