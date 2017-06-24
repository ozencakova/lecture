<?php

namespace App\Http\Requests\Lecture;

class EditRequest extends Request
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            'code' => 'required|string|max:4|min:4|unique:lectures,code,'.$this->route()->id,
        ]);
    }

    public function attributes(){
        return array_merge(parent::attributes(), [
            'code' => 'Kod'
        ]);
    }
}
