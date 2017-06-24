<?php

namespace App\Http\Requests\Student;

class AddRequest extends Request
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            'code' => 'required|string|max:10|min:10|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6'
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
