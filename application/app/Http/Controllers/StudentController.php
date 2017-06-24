<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Helpers\RedirectHelper;
use App\Privilege\Privilege;
use App\Services\StudentService;
use App\Http\Requests\Student\AddRequest;
use App\Http\Requests\Student\EditRequest;

use App\Http\Requests;

class StudentController extends Controller
{
    public function __construct(){
        Privilege::only(Role::Master);
    }

    public function show(){
        $result = StudentService::show();

        return view('student.list', (array) $result);
    }

    public function addView(){
        return view('student.add');
    }

    public function add(AddRequest $request){
        StudentService::add($request);

        return RedirectHelper::success('Öğrenci başarıyla eklendi.');
    }

    public function editView($id){
        $result = StudentService::editView($id);

        return view('student.edit', (array) $result);
    }

    public function edit($id, EditRequest $editRequest){
        StudentService::edit($id, $editRequest);

        return RedirectHelper::success('Öğrenci başarıyla düzenlendi.');
    }

    public function delete($id){
        StudentService::delete($id);

        return RedirectHelper::success('Öğrenci ve bağlı bulunan tüm kayıtlar silindi.');
    }
}
