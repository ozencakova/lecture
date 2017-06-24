<?php

namespace App\Http\Middleware;

use App\Enums\Role;
use App\Models\InsuranceRequests\CarInsuranceRequest;
use App\Models\InsuranceRequests\DASKRequest;
use App\Models\InsuranceRequests\HealthInsuranceRequest;
use App\Models\InsuranceRequests\HomeInsuranceRequest;
use App\Models\InsuranceRequests\TrafficInsuranceRequest;
use App\Models\InsuranceRequests\TravelInsuranceRequest;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ViewShare
{
    public function handle($request, \Closure $next){
        $result = new \stdClass();
        $result->shared = new \stdClass();

        $this->unreadMessageCount($result->shared);
        $this->requestCount($result->shared);

        View::share((array) $result);
        return $next($request);
    }

    public function unreadMessageCount($shared){
        $shared->unreadMessageCount = Message::isUser(Auth::user()->id)->NotSeen()->count();
    }

    public function requestCount($shared)
    {
        $currentUser = Auth::user();

        if($currentUser->role == Role::Dealer || $currentUser->role == Role::Admin || $currentUser->role == Role::Mod)
        {
            $shared->carInsuranceRequestCount = CarInsuranceRequest::displayFilter()->count();
            $shared->trafficInsuranceRequestCount = TrafficInsuranceRequest::displayFilter()->count();
            $shared->DASKRequestCount = DASKRequest::displayFilter()->count();
            $shared->homeInsuranceRequestCount = HomeInsuranceRequest::displayFilter()->count();
            $shared->healthInsuranceRequestCount = HealthInsuranceRequest::displayFilter()->count();
            $shared->travelInsuranceRequestCount = TravelInsuranceRequest::displayFilter()->count();
        }
        else if($currentUser->role == Role::User || $currentUser->role = Role::SubDealer)
        {
            $shared->carInsuranceRequestCount = CarInsuranceRequest::hasRequester($currentUser->id)->displayFilter()->count();
            $shared->trafficInsuranceRequestCount = TrafficInsuranceRequest::hasRequester($currentUser->id)->displayFilter()->count();
            $shared->DASKRequestCount = DASKRequest::hasRequester($currentUser->id)->displayFilter()->count();
            $shared->homeInsuranceRequestCount = HomeInsuranceRequest::hasRequester($currentUser->id)->displayFilter()->count();
            $shared->healthInsuranceRequestCount = HealthInsuranceRequest::hasRequester($currentUser->id)->displayFilter()->count();
            $shared->travelInsuranceRequestCount = TravelInsuranceRequest::hasRequester($currentUser->id)->displayFilter()->count();
        }
    }
}