<?php

namespace App\Http\Requests\UserAuth;

use App\Http\Requests\Request;

class LoginRequest extends Request
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
            'email' => 'required|string|email|max:255',
            'password' => 'required|min:6|max:20',
            'remember' => 'boolean'
        ];
    }

    public function attributes(){
        return [
            'email' => 'Email',
            'password' => 'Şifre',
            'remember' => 'Beni Hatırla'
        ];
    }
}
