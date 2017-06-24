<?php

namespace App\Helpers;

use Symfony\Component\VarDumper\Dumper\HtmlDumper;
use Symfony\Component\VarDumper\Cloner\VarCloner;

class DumpHelper
{
    public static function dump(){
        array_map(function ($value) {
            $dumper = new HtmlDumper;
            $cloner  = new VarCloner;
            $cloner->setMaxItems(-1);
            $cloner->setMaxString(-1);
            $dumper->setStyles([
                'default' => 'background-color:#fff; color:#222; line-height:1.2em; font-weight:normal; font:12px Monaco, Consolas, monospace; word-wrap: break-word; white-space: pre-wrap; position:relative; z-index:100000',
                'num' => 'color:#a71d5d',
                'const' => 'color:#795da3',
                'str' => 'color:#df5000',
                'cchr' => 'color:#222',
                'note' => 'color:#a71d5d',
                'ref' => 'color:#a0a0a0',
                'public' => 'color:#795da3',
                'protected' => 'color:#795da3',
                'private' => 'color:#795da3',
                'meta' => 'color:#b729d9',
                'key' => 'color:#df5000',
                'index' => 'color:#a71d5d',
            ]);
            $dumper->dump($cloner->cloneVar($value));
        }, func_get_args());
    }

    public static function dd(){
        call_user_func_array(__NAMESPACE__ .'\DumpHelper::dump', func_get_args());
        die(1);
    }

}