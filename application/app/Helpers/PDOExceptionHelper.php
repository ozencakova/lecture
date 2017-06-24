<?php

namespace App\Helpers;

use PDOException;

class PDOExceptionHelper{
    public static function beautify(PDOException $exception, $notFoundMessage){
        if($exception->errorInfo[1] == 1451){
            return 'Bağlantılı veri olduğundan silme veya güncelleme işlemi gerçekleştirilemedi.';
        }

        return $notFoundMessage;
    }
}