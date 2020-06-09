<?php


namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class DateService extends Facade
{
    protected static function getFacadeAccessor()
    {
        // возвращаем имя ячейки сервис-контейнера
        return 'dateCheck';
    }
}
