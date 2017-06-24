<?php
/**
 * Created by PhpStorm.
 * User: DRoW
 * Date: 26.01.2016
 * Time: 20:19
 */

namespace App\Helpers;

use stdClass;
use Response;

class AjaxHelper
{
    public static function success($message = "", $data = null){
        $result = new stdClass();

        $result->error = 0;
        $result->message = $message;
        $result->data = $data;

        return Response::json($result);
    }

    public static function fail($message){
        $result = new stdClass();
        $result->error = 1;
        $result->message = $message;
        $result->data = null;
        return Response::json($result);
    }
}