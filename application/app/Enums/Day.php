<?php

namespace App\Enums;

abstract class Day
{
    const Pazartesi = 1;
    const Salı = 2;
    const Çarşamba = 3;
    const Perşembe = 4;
    const Cuma = 5;
    const Cumartesi = 6;
    const Pazar = 7;

    public static function getDay()
    {
        return [
            1 => 'Pazartesi',
            2 => 'Salı',
            3 => 'Çarşamba',
            4 => 'Perşembe',
            5 => 'Cuma',
            6 => 'Cumartesi',
            7 => 'Pazar'
        ];
    }

    public static function allKeys(){
        return [
            static::Pazartesi,
            static::Salı,
            static::Çarşamba,
            static::Perşembe,
            static::Cuma,
            static::Cumartesi,
            static::Pazar
        ];
    }
}