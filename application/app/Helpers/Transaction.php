<?php

namespace App\Helpers;

use DB;
use Closure;
use Exception;

class Transaction
{
    public static function run($function)
    {
        DB::transaction($function);
    }

    public static function lockedRun(array $tables, Closure $callback){
        $locks = [];
        foreach($tables as $table => $lock){
            $locks[] = $table.' '.$lock;
        }

        $lockStr = implode(',', $locks);

        try{
            DB::connection()->getPdo()->exec('SET AUTOCOMMIT=0');
            DB::connection()->getPdo()->exec('LOCK TABLES '.$lockStr);

            $result = $callback();

            DB::connection()->getPdo()->exec('COMMIT');
        }
        catch(Exception $e){
            DB::connection()->getPdo()->exec('ROLLBACK');

            throw $e;
        }
        finally{
            DB::connection()->getPdo()->exec('UNLOCK TABLES');
            DB::connection()->getPdo()->exec('SET AUTOCOMMIT=1');
        }

        return $result;
    }
}