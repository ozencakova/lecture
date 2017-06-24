<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Privilege\Privilege;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function loginView(){
        return view('login');
    }
}
