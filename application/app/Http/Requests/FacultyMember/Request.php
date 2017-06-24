<?php

namespace App\Http\Requests\FacultyMember;

class Request extends \App\Http\Requests\Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'surname' => 'required|string|max:50',
            'email' => 'required|string|email|max:255',
            'start_date' => 'required|date'
        ];
    }

    public function attributes(){
        return [
            'name' => 'Ad',
            'surname' => 'Soyad',
            'email' => 'Email',
            'start_date' => 'Başlangıç tarihi'
        ];
    }
}
