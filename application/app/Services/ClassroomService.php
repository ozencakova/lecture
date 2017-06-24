<?php
namespace App\Services;

use App\Helpers\Transaction;
use App\Models\Classroom;
use App\Http\Requests\Classroom\AddRequest;
use App\Http\Requests\Classroom\EditRequest;

class ClassroomService
{
    public static function show(){
        $result = new \stdClass();

        Transaction::run(function() use($result) {
            $result->classrooms = Classroom::all();
        });

        return $result;
    }

    public static function addView(){
        $result = new \stdClass();

        Transaction::run(function() use($result) {
            $result->floor = Classroom::floor()->pluck('name', 'id');
        });

        return $result;
    }

    public static function add(AddRequest $request){
        Transaction::run(function() use($request) {

            $parent_id = $request->input('parent_id');
            if(!isset($parent_id))
            {
                $data['type'] = 1;
            }
            else
            {
                $data['type'] = 0;
            }

            $classroom = new Classroom();
            $classroom->fill($request->onlyRules());//trim unnecessary data
            $classroom->save();
        });
    }

    public static function editView($id){
        $result = new \stdClass();

        Transaction::run(function() use($id, $result) {
            $result->classroom = Classroom::findOrFail($id);
            $result->floor = Classroom::floor()->pluck('name', 'id');
        });

        return $result;
    }

    public static function edit($id, EditRequest $request){
        Transaction::run(function() use($id, $request) {
            $data = $request->onlyRules();

            $parent_id = $request->input('parent_id');
            if(!isset($parent_id))
            {
                $data['type'] = 0;
            }
            else
            {
                $data['type'] = 1;
            }

            $classroom = Classroom::findOrFail($id);
            $classroom->update($data);

        });
    }

    public static function delete($studentId){
        Transaction::run(function() use($studentId) {
            Classroom::destroy($studentId);
        });
    }
}