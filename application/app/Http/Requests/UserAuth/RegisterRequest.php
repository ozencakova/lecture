<?php

namespace App\Http\Requests\UserAuth;

use App\Enums\EducationStatus;
use App\Enums\MaritalStatus;
use App\Enums\UserRole;
use App\Http\Requests\Request;
use App\Models\District;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class RegisterRequest extends Request
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
        switch($this->input('type', '1')){
            case '3':
            case '2':
                return [
                    'tax_no' => 'required|string|size:10',
                    'name' => 'required|string|max:50',
                    'email' => 'required|string|email|max:255|unique:users',
                    'phone_number' => 'required|string|max:50',
                    'password' => 'required|min:6|max:20|confirmed',
                    'province_id' => 'required|integer',
                    'district_id' => 'required|integer'
                ];
            default:
                return [
                    'tc_no' => 'required|string|size:11',
                    'name' => 'required|string|max:50',
                    'surname' => 'required|string|max:50',
                    'email' => 'required|string|email|max:255|unique:users',
                    'phone_number' => 'required|string|max:50',
                    'password' => 'required|min:6|max:20|confirmed',
                    'education' => 'required|integer|in:'.implode(',', EducationStatus::allKeys()),
                    'marital_status' => 'required|integer|in:'.implode(',', MaritalStatus::allKeys()),
                    'job' => 'required|string|max:255',
                    'birthdate' => 'required|string|date_format:d.m.Y',
                    'province_id' => 'required|integer',
                    'district_id' => 'required|integer'
                ];
        }
    }

    public function attributes(){
        switch($this->input('type', '1')){
            case '3':
            case '2':
                return [
                    'tax_no' => 'Vergi Numarası',
                    'name' => 'Şirket Adı',
                    'email' => 'Email',
                    'phone_number' => 'Telefon',
                    'password' => 'Şifre',
                    'province_id' => 'İl',
                    'district_id' => 'İlçe'
                ];
            default:
                return [
                    'tc_no' => 'TC Kimlik Numarası',
                    'name' => 'Ad',
                    'surname' => 'Soyad',
                    'email' => 'Email',
                    'phone_number' => 'Telefon',
                    'password' => 'Şifre',
                    'education' => 'Eğitim',
                    'marital_status' => 'Medeni Durum',
                    'job' => 'Meslek',
                    'birthdate' => 'Doğum Tarihi',
                    'province_id' => 'İl',
                    'district_id' => 'İlçe'
                ];
        }
    }

    public function afterValidation($validator){
        switch($this->input('type', '1')) {
            case '3':
                $this->merge(['role' => UserRole::SubDealer]);
                break;
            case '2':
                $this->merge(['role' => UserRole::User]);
                break;
            default:
                $isTcNoValid = check_online_tcno(
                    $this->input('tc_no'),
                    $this->input('name'),
                    $this->input('surname'),
                    (new Carbon($this->input('birthdate')))->year
                );

                if(!$isTcNoValid){
                    $validator->errors()->add('TcNoFailed', 'Bilgileriniz onaylanamadı. Lütfen girilen TC Kimlik Numarası, Ad, Soyad ve Doğum Tarihi\'nin doğruluğundan emin olunuz.');

                    return false;
                }

                $this->merge(['role' => UserRole::User]);
        }

        $district = District::is($this->input('district_id'))->firstOrFail();
        $this->merge(['province_id' => $district->province_id]);

        $this->merge(['password' => Hash::make($this->input('password'))]);
        $this->merge(['mail_activation_token' => secure_random_string(16) ]);

        return true;
    }
}
