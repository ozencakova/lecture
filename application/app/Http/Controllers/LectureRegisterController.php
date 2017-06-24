<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Helpers\RedirectHelper;
use App\Privilege\Privilege;
use App\Services\LectureRegisterService;

class LectureRegisterController extends Controller
{
    public function __construct(){
        Privilege::only(Role::Student);
    }


    public function view(){
        $result = LectureRegisterService::show();

        return view('lecture-register', (array) $result);
    }

    public function add($lectureId){
        $result = LectureRegisterService::register($lectureId);

        if($result->type)
            return RedirectHelper::success($result->messages);
        else
            return RedirectHelper::fail($result->messages);
    }
}
