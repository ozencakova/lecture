<?php

namespace App\Privilege;

use App\Enums\Role;
use Illuminate\Support\Facades\Auth;

class Privilege
{
    private static function callFunction($functionName, $args){
        return call_user_func_array(array(__CLASS__, $functionName), $args);
    }

    public static function fail(){
        abort(403);
    }

    public static function only(){
        if(!static::callFunction('hasOnly', func_get_args())){
            static::fail();
        }
    }

    public static function except(){
        if(!static::callFunction('hasExcept', func_get_args())){
            static::fail();
        }
    }

    public static function hasOnly(){
        $user = Auth::user();

        foreach (func_get_args() as $role){
            if($role == Role::Guest){
                if(is_null($user)){
                    return true;
                }
            }
            else if($user != null && $user->role == $role){
                return true;
            }
        }

        return false;
    }

    public static function hasExcept(){
        $user = Auth::user();

        foreach (func_get_args() as $role){
            if($role == Role::Guest){
                if(is_null($user)){
                    return false;
                }
            }
            else if($user != null && $user->role == $role){
                return false;
            }
        }

        return true;
    }
}