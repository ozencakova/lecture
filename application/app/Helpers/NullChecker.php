<?php

namespace App\Helpers;

use App\Exceptions\BaseException;
use \Exception;
use Illuminate\Database\Eloquent\Collection;

class NullChecker
{
    /**
     * @param $obj
     * @param string $msg
     * @return mixed
     * @throws BaseException
     */
    public static function check($obj, $msg = '')
    {
        if(is_null($obj))
        {
            throw new BaseException($msg);
        }
        else
        {
            return $obj;
        }
    }

    /**
     * @param $obj
     * @param string $msg
     * @return mixed
     * @throws BaseException
     */
    public static function checkEmpty($obj, $msg)
    {
        if(empty($obj))
        {
            throw new BaseException($msg);
        }

        if($obj instanceof Collection && $obj->isEmpty())
        {
            throw new BaseException($msg);
        }

        return $obj;
    }
}