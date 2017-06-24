<?php

namespace App\Http\Requests\Student;

class EditRequest extends Request
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            'code' => 'required|string|max:10|min:10|unique:users,code,'.$this->route()->id,
            'email' => 'required|email|max:255|unique:users,email,'.$this->route()->id,
            'password' => 'min:6'
        ]);
    }

    public function attributes(){
        return array_merge(parent::attributes(), [
            'code' => 'Kod',
            'email' => 'Email',
            'password' => 'Şifre'
        ]);
    }
}
