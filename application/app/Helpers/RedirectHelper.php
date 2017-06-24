<?php

namespace App\Helpers;

class RedirectHelper
{
    public static function success($msg)
    {
        return redirect()->back()->with('success_message', $msg);
    }

    public static function fail($msg)
    {
        return redirect()->back()->withInput()->withErrors($msg);
    }

    public static function intended($url){
        return redirect()->intended($url);
    }

    public static function action($action, $parameters = []){
        return redirect()->action($action, $parameters);
    }
}