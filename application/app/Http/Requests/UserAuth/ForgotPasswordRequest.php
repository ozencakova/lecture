<?php

namespace App\Http\Requests\UserAuth;

use App\Enums\UserBanStatus;
use App\Enums\UserStatus;
use App\Http\Requests\Request;

class ForgotPasswordRequest extends Request
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
            'email' => 'required|string|email|max:255|exists:users,email,activated,'.UserStatus::Activated.',banned,'.UserBanStatus::NotBanned
        ];
    }

    public function attributes(){
        return [
            'email' => 'Email'
        ];
    }
}
