<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacultyMember extends Model
{
    protected $table = 'faculty_members';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $dates = ['start_date'];

    public function lecture() { return $this->hasMany('App\Models\Lecture', 'faculty_member_id'); }

}
