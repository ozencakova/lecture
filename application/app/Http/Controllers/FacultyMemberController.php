<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Helpers\RedirectHelper;
use App\Privilege\Privilege;
use App\Services\FacultyMemberService;
use App\Http\Requests\FacultyMember\AddRequest;
use App\Http\Requests\FacultyMember\EditRequest;

use App\Http\Requests;

class FacultyMemberController extends Controller
{
    public function __construct(){
        Privilege::only(Role::Master);
    }

    public function show(){
        $result = FacultyMemberService::show();

        return view('faculty-member.list', (array) $result);
    }

    public function addView(){
        return view('faculty-member.add');
    }

    public function add(AddRequest $request){
        FacultyMemberService::add($request);

        return RedirectHelper::success('Ögretim Görevlisi başarıyla eklendi.');
    }

    public function editView($id){
        $result = FacultyMemberService::editView($id);
//dd($result);
        return view('faculty-member.edit', (array) $result);
    }

    public function edit($id, EditRequest $editRequest){
        FacultyMemberService::edit($id, $editRequest);

        return RedirectHelper::success('Ögretim Görevlisi başarıyla düzenlendi.');
    }

    public function delete($id){
        FacultyMemberService::delete($id);

        return RedirectHelper::success('Ögretim Görevlisi ve bağlı bulunan tüm kayıtlar silindi.');
    }
}
