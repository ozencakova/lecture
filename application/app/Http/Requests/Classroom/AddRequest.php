<?php

namespace App\Http\Requests\Classroom;

class AddRequest extends Request
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            'code' => 'required|string|max:3|min:3|unique:classrooms'
        ]);
    }

    public function attributes(){
        return array_merge(parent::attributes(), [
            'code' => 'Kod'
        ]);
    }
}
