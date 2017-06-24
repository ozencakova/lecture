<?php

namespace App\Http\Requests\Lecture;

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
            'classroom_id' => 'required|integer',
            'faculty_member_id' => 'required|integer',
            'day' => 'required|integer',
            'time' => 'required|string|max:5'
        ];
    }

    public function attributes(){
        return [
            'name' => 'Ad',
            'classroom_id' => 'Sınıf',
            'faculty_member_id' => 'Öğretim Görevlisi',
            'day' => 'Gün',
            'time' => 'Saat'
        ];
    }
}
