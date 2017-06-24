<?php


namespace App\CronJobs;


use App\Helpers\Transaction;
use App\Models\User;

class DeleteNotActivatedUsers
{
    private static function initialize()
    {
        ini_set('max_execution_time', 300);
    }

    public static function process(){
        try {
            self::initialize();

            Transaction::run(function () {
                User::notActivatedDeletable()->delete();
            });
        }
        catch(\Exception $ex){
            //echo $ex->getMessage();
        }
    }
}