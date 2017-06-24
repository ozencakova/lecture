<?php

namespace App\Http\Requests\Classroom;

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
            'parent_id' => 'integer'
        ];
    }

    public function attributes(){
        return [
            'name' => 'Ad',
            'parent_id' => 'Kat bilgisi'
        ];
    }
}
