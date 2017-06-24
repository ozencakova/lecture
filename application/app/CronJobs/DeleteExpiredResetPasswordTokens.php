<?php


namespace App\CronJobs;

use App\Helpers\Transaction;
use App\Models\User;

class DeleteExpiredResetPasswordTokens
{
    private static function initialize()
    {
        ini_set('max_execution_time', 300);
    }

    public static function process(){
        try {
            self::initialize();

            Transaction::run(function () {
                User::expiredDeletablePasswordToken()
                    ->update(['reset_password_token' => null, 'reset_password_token_date' => null]);
            });
        }
        catch(\Exception $ex){
            //echo $ex->getMessage();
        }
    }
}