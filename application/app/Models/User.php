<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function lecture_register() { return $this->hasMany('App\Models\LectureRegister', 'student_id'); }

    //Scopes
    public function scopeStudent($query) { return $query->where('role', 2); }

    public function scopeMaster($query) { return $query->where('role', 1); }

}

