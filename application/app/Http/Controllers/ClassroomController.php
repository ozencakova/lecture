<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Helpers\RedirectHelper;
use App\Privilege\Privilege;
use App\Services\ClassroomService;
use App\Http\Requests\Classroom\AddRequest;
use App\Http\Requests\Classroom\EditRequest;

use App\Http\Requests;

class ClassroomController extends Controller
{
    public function __construct(){
        Privilege::only(Role::Master);
    }

    public function show(){
        $result = ClassroomService::show();

        return view('classroom.list', (array) $result);
    }

    public function addView(){
        $result = ClassroomService::addView();

        return view('classroom.add', (array) $result);
    }

    public function add(AddRequest $request){
        ClassroomService::add($request);

        return RedirectHelper::success('Bina bilgisi başarıyla eklendi.');
    }

    public function editView($id){
        $result = ClassroomService::editView($id);

        return view('classroom.edit', (array) $result);
    }

    public function edit($id, EditRequest $editRequest){
        ClassroomService::edit($id, $editRequest);

        return RedirectHelper::success('Bina bilgisi başarıyla düzenlendi.');
    }

    public function delete($id){
        ClassroomService::delete($id);

        return RedirectHelper::success('Bina bilgisi ve bağlı bulunan tüm kayıtlar silindi.');
    }
}
