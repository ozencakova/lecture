<?php

function uploads_path($path)
{
    return base_path('..' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $path);
}

function company_logo_path($id = null){
    if(is_null($id)){
        return uploads_path('company/');
    }

    return uploads_path('company/'.$id.'/');
}

function logo_path(){
    return uploads_path('logo/');
}

function slide_path($id = null){
    if(is_null($id)){
        return uploads_path('slide/');
    }

    return uploads_path('slide/'.$id.'/');
}

function assets($path){
    return asset('assets/'.$path);
}

function css($path){
    return assets('css/'.$path);
}

function files($path){
    return assets('files/'.$path);
}

function fonts($path){
    return assets('fonts/'.$path);
}

function images($path){
    return assets('images/'.$path);
}

function js($path){
    return assets('js/'.$path);
}

function plugins($path){
    return assets('plugins/'.$path);
}

function uploads($path){
    return asset('uploads/'.$path);
}

function company_logo_url($id, $fileName){
    return uploads('company/'.$id.'/'.$fileName);
}

function slide_url($id, $fileName){
    return uploads('slide/'.$id.'/'.$fileName);
}

function logo_url(){
    return uploads('logo/logo.png');
}

function show_queries()
{
    \DB::listen(function($e) {
        $query = $e->sql;
        foreach($e->bindings as $param)
        {
            $pos = strpos($query,'?');
            if ($pos !== false)
            {
                $query = substr_replace($query,"'".$param."'",$pos,strlen('?'));
            }
        }

        echo '<p>'.$query.';</p>';
    });
}

function emptyFieldsToNull(&$data)
{
    foreach ($data as &$item)
    {
        if(is_array($item))
        {
            emptyFieldsToNull($data);
        }
        else
        {
            if(empty($item)) { $item = null; }
        }
    }
}

/**
 * @param App\Http\Requests\Request $request
 * @param array|string|null $except
 * @param array|string|null $additional
 * @return array
 */
function formRequestTrimKeys(App\Http\Requests\Request $request, $except = null, $additional = null){
    $rules = $request->rules();
    $keys = array_keys($rules);

    if(!is_null($additional)){
        $additional = is_array($additional) ? $additional : [$additional];

        $keys = array_merge($keys, $additional);
    }

    if(!is_null($except)){
        $except = !is_array($except) ? [$except] : $except;

        $keys = array_diff($keys, $except);
    }

    return $request->only($keys);
}

function base64_file_encode($input) {
    return strtr(base64_encode($input), '+/=', '-_,');
}

function base64_file_decode($input) {
    return base64_decode(strtr($input, '-_,', '+/='), true);
}

function dotdot($string, $maxLength){
    return mb_strlen($string, "UTF-8") > $maxLength ? mb_substr($string, 0, $maxLength, "UTF-8")."..." : $string;
}

function format_money($value){
    return number_format($value, 2, ',', '.');
}

function weburl_text($value) {
    return preg_replace('#^https?://#', '', $value);
}

/**
 * Generates random secure hex string x2 of byteLength
 * @param $byteLength
 * @return string
 */
function secure_random_string($byteLength){
    return bin2hex(openssl_random_pseudo_bytes($byteLength));
}

function turkish_tolower($string){
    $uppercaseLetters = ['A', 'B', 'C', 'Ç', 'D', 'E', 'F', 'G', 'Ğ', 'H', 'I', 'İ', 'J', 'K', 'L', 'M', 'N', 'O', 'Ö', 'P', 'R', 'S', 'Ş', 'T', 'U', 'Ü', 'V', 'Y', 'Z'];

    $lowercaseLetters = ['a', 'b', 'c', 'ç', 'd', 'e', 'f', 'g', 'ğ', 'h', 'ı', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'ö', 'p', 'r', 's', 'ş', 't', 'u', 'ü', 'v', 'y', 'z'];

    return str_replace($uppercaseLetters, $lowercaseLetters, $string);
}

function turkish_toupper($string){
    $uppercaseLetters = ['A', 'B', 'C', 'Ç', 'D', 'E', 'F', 'G', 'Ğ', 'H', 'I', 'İ', 'J', 'K', 'L', 'M', 'N', 'O', 'Ö', 'P', 'R', 'S', 'Ş', 'T', 'U', 'Ü', 'V', 'Y', 'Z'];

    $lowercaseLetters = ['a', 'b', 'c', 'ç', 'd', 'e', 'f', 'g', 'ğ', 'h', 'ı', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'ö', 'p', 'r', 's', 'ş', 't', 'u', 'ü', 'v', 'y', 'z'];

    return str_replace($lowercaseLetters, $uppercaseLetters, $string);
}

function check_online_tcno($tcNo, $name, $surname, $birthYear){
    try{
        if(is_string($name)){
            $name = turkish_toupper($name);
        }

        if(is_string($surname)){
            $surname = turkish_toupper($surname);
        }

        $url = "https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx?WSDL";

        $client = new SoapClient($url);

        $validation = [
            'TCKimlikNo' => $tcNo,
            'Ad' => $name,
            'Soyad' => $surname,
            'DogumYili' => $birthYear
        ];

        $result = @$client->TCKimlikNoDogrula($validation);

        return (bool) $result->TCKimlikNoDogrulaResult;
    }
    catch(Exception $ex){
        return false;
    }
}

function range_numbers_padded($min, $max){
    $padding = strlen($max);
    $numbers = [];

    for(; $min <= $max; $min++){
        $numbers[] = str_pad($min, $padding, '0', STR_PAD_LEFT);
    }

    return $numbers;
}