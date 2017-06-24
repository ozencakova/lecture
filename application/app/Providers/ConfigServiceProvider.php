<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    protected $configFolder = 'setting';
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $filePath = base_path($this->configFolder);
        $files = glob($filePath.DIRECTORY_SEPARATOR.'*.php');
        foreach($files as $file){
            $configs = include($file);
            $configFile = basename($file, ".php");
            foreach($configs as $key => $config){
                Config::set($configFile.'.'.$key, $config);
            }
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
