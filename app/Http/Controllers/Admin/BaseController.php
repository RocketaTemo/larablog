<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController as GuestBaseController;

/**
 * Базовый контроллер для всех контроллеров управления блогом в админке
 *
 * @package App\Http\Controllers\Admin
 *
 */
abstract class BaseController extends GuestBaseController
{

    /**
     * BaseController constructor.
     */

    protected function __construct()
    {
        //Инициализация общих моментов для админки
    }
}
