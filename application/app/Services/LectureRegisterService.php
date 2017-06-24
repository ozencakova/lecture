<?php
namespace App\Services;

use App\Helpers\Transaction;
use App\Models\Lecture;
use App\Models\LectureRegister;
use Illuminate\Support\Facades\Auth;

class LectureRegisterService
{
    public static function show(){
        $result = new \stdClass();

        Transaction::run(function() use($result) {
            $result->lectures = Lecture::all();
        });
        return $result;
    }

    public static function register($lectureId){
        $result = new \stdClass();
        Transaction::run(function() use($result, $lectureId){

            $lecture = Lecture::findOrFail($lectureId);
            $userId = Auth::user()->id;

            $result->type = 1;
            $result->messages = 'Dersiniz başarıyla eklendi.';

            if(!LectureRegister::canAddMandatoryLecture($userId) && $lecture->is_mandatory){
                $result->type = 0;
                $result->messages = ['Üçten fazla zorunlu ders eklenemez.'];
            }
            if(!LectureRegister::canAddOptionalLecture($userId) && !$lecture->is_mandatory) {
                $result->type = 0;
                $result->messages = 'İkiden fazla seçmeli ders eklenemez.';
            }

            if(!LectureRegister::lectureIs($userId, $lecture->id)) {
                $result->type = 0;
                $result->messages = 'Aynı dersi seçemezsiniz.';
            }

            $data['lecture_id'] = $lecture->id;
            $data['student_id'] = $userId;
            $data['code'] = 'LR00'.$lectureId.'00'.$userId;

            if($result->type){
                $lectureRegister = new LectureRegister();
                $lectureRegister->fill($data);
                $lectureRegister->save();
            }

        });
        return $result;
    }

}