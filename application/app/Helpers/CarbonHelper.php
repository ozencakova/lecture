<?php

namespace App\Helpers;

use Carbon\Carbon;
use Lang;

class CarbonHelper
{
    protected static $currentMonthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    protected static $monthNamesForCurrentLanguage = ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'];

    public static function convertToLocale($date){
        return str_replace(static::$currentMonthNames, static::$monthNamesForCurrentLanguage, $date);
    }

    public static function createDate($year, $month, $day = 1)
    {
        return Carbon::create($year, $month, $day, 0, 0, 0);
    }

    public static function createFromString($dateTimeString)
    {
        return Carbon::createFromFormat('Y-m-d', $dateTimeString);
    }

    public static function createFromDateTimeString($dateTimeString){
        return Carbon::createFromFormat('Y-m-d H:i:s', $dateTimeString);
    }

    public static function formatTurkishDateTime(Carbon $date)
    {
        return static::convertToLocale($date->setTimezone('Europe/Istanbul')->format('j F Y H:i:s'));
    }
    public static function formatTurkishDateTimeInput(Carbon $date)
    {
        return static::convertToLocale($date->setTimezone('Europe/Istanbul')->format('d-m-Y'));
    }

    public static function formatTurkishDate(Carbon $date = null)
    {
        if(is_null($date)) { return '-'; }
        return static::convertToLocale($date->setTimezone('Europe/Istanbul')->format('j F Y'));
    }
    public static function formatTurkishDateShort(Carbon $date = null)
    {
        if(is_null($date)) { return '-'; }
        return static::convertToLocale($date->setTimezone('Europe/Istanbul')->format('d/m/Y'));
    }

    public static function formatTurkishMonth(Carbon $date){
        return static::convertToLocale($date->setTimezone('Europe/Istanbul')->format('F'));
    }

    public static function formatTurkishMonthYear(Carbon $date){
        return static::convertToLocale($date->setTimezone('Europe/Istanbul')->format('F Y'));
    }

    public static function formatTurkishTime(Carbon $date)
    {
        return $date->setTimezone('Europe/Istanbul')->format('H:i');
    }

    public static function compareMonthAndYear(Carbon $date1, Carbon $date2)
    {
        $d1 = CarbonHelper::createDate($date1->year, $date1->month);
        $d2 = CarbonHelper::createDate($date2->year, $date2->month);

        if($d1->gt($d2)) return 1;
        else if($d1->eq($d2)) return 0;
        else return -1;
    }
}