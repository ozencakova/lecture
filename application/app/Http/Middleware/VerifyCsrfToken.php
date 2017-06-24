<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Illuminate\Support\Facades\Route;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    protected $exceptActions = [
        //App\Http\Controllers\DashboardController@show ex.
        'App\Http\Controllers\PurchaseController@result'
    ];

    public function handle($request, \Closure $next){
        if(in_array(Route::getCurrentRoute()->getActionName(), $this->exceptActions)){
            return $next($request);
        }

        return parent::handle($request, $next);
    }
}
