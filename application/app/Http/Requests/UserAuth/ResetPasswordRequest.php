<?php

namespace App\Http\Requests\UserAuth;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordRequest extends Request
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
            'password' => 'required|min:6|max:20|confirmed'
        ];
    }

    public function attributes(){
        return [
            'password' => 'Şifre'
        ];
    }

    public function afterValidation($validator){
        $this->merge(['password' => Hash::make($this->input('password'))]);

        return true;
    }
}
