<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LectureRegister extends Model
{
    protected $table = 'lecture_registers';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function lecture() { return $this->belongsTo('App\Models\Lecture', 'lecture_id'); }
    public function student() { return $this->belongsTo('App\Models\User', 'student_id'); }

    //Scopes
    public function scopeStudentIs($query, $studentId){
        return $query->where('student_id', $studentId);
    }

    //Functions
    public static function canAddMandatoryLecture($studentId)
    {
        return LectureRegister::studentIs($studentId)->whereHas('lecture', function($query) {
            $query->where('is_mandatory', 1);
        })->count() < 3;
    }
    public static function canAddOptionalLecture($studentId)
    {
        return LectureRegister::studentIs($studentId)->whereHas('lecture', function($query) {
            $query->where('is_mandatory', 0);
        })->count() < 2;
    }
    public static function lectureIs($studentId, $lectureId)
    {
        return LectureRegister::studentIs($studentId)->where('lecture_id', $lectureId)->count() < 1;
    }
}
