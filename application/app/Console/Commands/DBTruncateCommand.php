<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Config;

class DBTruncateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:truncate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removes All Tables';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $dbName = DB::connection()->getDatabaseName();

            DB::statement("SET foreign_key_checks = 0");

            $tables = DB::select(
                DB::raw(
                    'select table_name from information_schema.tables'.
                    ' where table_schema=\''.$dbName.'\''
                )
            );

            if(count($tables) > 0){
                $query = "DROP TABLE IF EXISTS ";
                for($i = 0; $i < count($tables)-1;$i++){
                    $query .= "`".$tables[$i]->table_name."`, ";
                }

                $query .= "`".$tables[$i]->table_name."`";

                DB::statement($query);
            }

            $views = DB::select(
                DB::raw(
                    'select table_name from information_schema.views'.
                    ' where table_schema=\''.$dbName.'\''
                )
            );

            if(count($views) > 0){

                $query = "DROP VIEW IF EXISTS ";
                for($i = 0; $i < count($views)-1;$i++){
                    $query .= "`".$views[$i]->table_name."`, ";
                }

                $query .= "`".$views[$i]->table_name."`";

                DB::statement($query);
            }

            DB::statement("SET foreign_key_checks = 1");
        }
        catch(\PDOException $ex){
            $this->error("Whoops something whent wrong!\n");
            if(Config::get("app.debug")) {
                $this->error($ex->getMessage());
            }
            return;
        }
        $this->info("All tables removed successfully.");
    }
}
