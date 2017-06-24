<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Enums\Day;
use App\Helpers\RedirectHelper;
use App\Privilege\Privilege;
use App\Services\LectureService;
use App\Http\Requests\Lecture\AddRequest;
use App\Http\Requests\Lecture\EditRequest;

use App\Http\Requests;

class LectureController extends Controller
{
    public function __construct(){
        Privilege::only(Role::Master);
    }

    public function show(){
        $result = LectureService::show();

        return view('lecture.list', (array) $result);
    }

    public function addView(){
        $result = LectureService::addView();

        return view('lecture.add', (array) $result);
    }

    public function add(AddRequest $request){
        LectureService::add($request);

        return RedirectHelper::success('Ders başarıyla eklendi.');
    }

    public function editView($id){
        $result = LectureService::editView($id);

        return view('lecture.edit', (array) $result);
    }

    public function edit($id, EditRequest $editRequest){
        LectureService::edit($id, $editRequest);

        return RedirectHelper::success('Ders başarıyla düzenlendi.');
    }

    public function delete($id){
        LectureService::delete($id);

        return RedirectHelper::success('Ders ve bağlı bulunan tüm kayıtlar silindi.');
    }
}
