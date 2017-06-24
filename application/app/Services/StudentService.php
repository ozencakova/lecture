<?php
namespace App\Services;

use App\Helpers\Transaction;
use App\Models\User;
use App\Http\Requests\Student\AddRequest;
use App\Http\Requests\Student\EditRequest;
use Illuminate\Support\Facades\Hash;

class StudentService
{
    public static function show(){
        $result = new \stdClass();

        Transaction::run(function() use($result) {
            $result->students = User::student()->get();
        });

        return $result;
    }

    public static function add(AddRequest $request){
        Transaction::run(function() use($request) {
            $data = $request->onlyRules();
            $data['role'] = 2;
            $data['password'] = Hash::make($request->password);

            $student = new User();
            $student->fill($data);
            $student->save();
        });
    }

    public static function editView($id){
        $result = new \stdClass();

        Transaction::run(function() use($id, $result) {
            $result->student = User::findOrFail($id);
        });

        return $result;
    }

    public static function edit($id, EditRequest $request){
        Transaction::run(function() use($id, $request) {
            $data = $request->onlyRules();
            $student = User::findOrFail($id);
            if(!isset($request->password))
                $data['password'] = $student->password;
            else
                $data['password'] = Hash::make($request->password);

            $student->update($data);

        });
    }

    public static function delete($studentId){
        Transaction::run(function() use($studentId) {
            User::destroy($studentId);
        });
    }
}