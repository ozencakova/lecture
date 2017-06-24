<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Privilege\Privilege;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(){
        Privilege::only(Role::Master, Role::Student);
    }


    public function show()
    {
        return view('dashboard');
    }
}
