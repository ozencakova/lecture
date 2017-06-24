<?php

namespace App\Http\Requests\Lecture;

class AddRequest extends Request
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            'code' => 'required|string|max:4|min:4|unique:lectures'
        ]);
    }

    public function attributes(){
        return array_merge(parent::attributes(), [
            'code' => 'Kod'
        ]);
    }
}
