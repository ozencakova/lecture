<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{

    protected $table = 'classrooms';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function lecture() { return $this->hasMany('App\Models\Lecture', 'classroom_id'); }

    public function parent() { return $this->belongsTo('App\Models\Classroom', 'parent_id', 'id'); }

    public function children(){ return $this->hasMany('App\Models\Classroom', 'parent_id', 'id'); }

    //Scopes
    public function scopeClassroom($query) { return $query->where('type', 1); }

    public function scopeFloor($query) { return $query->where('type', 0); }

    //Functions
    public function getFloorName(){
        return $this->parent->name;
    }
}
