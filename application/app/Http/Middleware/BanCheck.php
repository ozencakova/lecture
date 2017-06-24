<?php

namespace App\Http\Middleware;

use App\Helpers\RedirectHelper;
use Closure;
use Illuminate\Support\Facades\Auth;

class BanCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if(!is_null($user) && $user->isBanned())
        {
            Auth::logout();

            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            }
            else {
                return RedirectHelper::action('HomeController@show');
            }
        }

        return $next($request);
    }
}
