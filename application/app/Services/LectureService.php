<?php
namespace App\Services;

use App\Helpers\Transaction;
use App\Models\Classroom;
use App\Models\FacultyMember;
use App\Models\Lecture;
use App\Http\Requests\Lecture\AddRequest;
use App\Http\Requests\Lecture\EditRequest;

class LectureService
{
    public static function show(){
        $result = new \stdClass();

        Transaction::run(function() use($result) {
            $result->lectures = Lecture::all();
        });

        return $result;
    }

    public static function addView(){
        $result = new \stdClass();

        Transaction::run(function() use($result) {
            $result->classroom = Classroom::classroom()->pluck('name', 'id');
            $result->facultyMember = FacultyMember::all()->pluck('name', 'id');
        });

        return $result;
    }

    public static function add(AddRequest $request){
        Transaction::run(function() use($request) {
            $data = $request->onlyRules();

            $isMandatory = $request->input('is_mandatory');
            if(!isset($isMandatory))
            {
                $data['is_mandatory'] = 0;
            }
            else
            {
                $data['is_mandatory'] = 1;
            }

            $lecture = new Lecture();
            $lecture->fill($data);
            $lecture->save();
        });
    }

    public static function editView($id){
        $result = new \stdClass();

        Transaction::run(function() use($id, $result) {
            $result->lecture = Lecture::findOrFail($id);
            $result->classroom = Classroom::classroom()->pluck('name', 'id');
            $result->facultyMember = FacultyMember::all()->pluck('name', 'id');
        });

        return $result;
    }

    public static function edit($id, EditRequest $request){
        Transaction::run(function() use($id, $request) {
            $data = $request->onlyRules();

            $isMandatory = $request->input('is_mandatory');
            if(!isset($isMandatory))
            {
                $data['is_mandatory'] = 0;
            }
            else
            {
                $data['is_mandatory'] = 1;
            }

            $lecture = Lecture::findOrFail($id);
            $lecture->update($data);

        });
    }

    public static function delete($lectureId){
        Transaction::run(function() use($lectureId) {
            Lecture::destroy($lectureId);
        });
    }
}