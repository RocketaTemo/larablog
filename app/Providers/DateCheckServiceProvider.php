<?php


namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\DateCheck;

class DateCheckServiceProvider extends ServiceProvider
{
    //добавляем функционаол в сервис-контейнер
    public function register(){
        //bind связывает класс с сервис-контейнером
        //в ячейке dateCheck храним объект класса App\Services\DateCheck
        $this->app->bind('dateCheck', DateCheck::class);
    }
}
