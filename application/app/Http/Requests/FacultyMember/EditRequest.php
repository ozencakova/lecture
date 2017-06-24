<?php

namespace App\Http\Requests\FacultyMember;

class EditRequest extends Request
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            'code' => 'required|string|max:5|min:5|unique:faculty_members,code,'.$this->route()->id,
        ]);
    }

    public function attributes(){
        return array_merge(parent::attributes(), [
            'code' => 'Kod'
        ]);
    }
}
