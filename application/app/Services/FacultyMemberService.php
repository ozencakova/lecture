<?php
namespace App\Services;

use App\Helpers\Transaction;
use App\Models\FacultyMember;
use App\Http\Requests\FacultyMember\AddRequest;
use App\Http\Requests\FacultyMember\EditRequest;

class FacultyMemberService
{
    public static function show(){
        $result = new \stdClass();

        Transaction::run(function() use($result) {
            $result->facultyMembers = FacultyMember::all();
        });

        return $result;
    }

    public static function add(AddRequest $request){
        Transaction::run(function() use($request) {

            $facultyMember = new FacultyMember();
            $facultyMember->fill($request->onlyRules());//trim unnecessary data
            $facultyMember->save();
        });
    }

    public static function editView($id){
        $result = new \stdClass();

        Transaction::run(function() use($id, $result) {
            $result->facultyMember = FacultyMember::findOrFail($id);
        });

        return $result;
    }

    public static function edit($id, EditRequest $request){
        Transaction::run(function() use($id, $request) {
            $data = $request->onlyRules();

            $facultyMember = FacultyMember::findOrFail($id);
            $facultyMember->update($data);

        });
    }

    public static function delete($facultyMemberId){
        Transaction::run(function() use($facultyMemberId) {
            FacultyMember::destroy($facultyMemberId);
        });
    }
}