<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $table = 'lectures';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function classroom() { return $this->belongsTo('App\Models\Classroom', 'classroom_id'); }

    public function faculty_member() { return $this->belongsTo('App\Models\FacultyMember', 'faculty_member_id'); }

    public function lecture_register() { return $this->hasMany('App\Models\LectureRegister', 'lecture_id'); }


    //Scopes
    public function scopeMandatory($query) { return $query->where('is_mandatory', 1); }

    public function scopeOptional($query) { return $query->where('is_mandatory', 0); }

}
