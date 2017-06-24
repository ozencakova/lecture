<?php

namespace App\Http\Requests\Student;

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
            'surname' => 'required|string|max:50'
        ];
    }

    public function attributes(){
        return [
            'name' => 'Ad',
            'surname' => 'Soyad'
        ];
    }
}
