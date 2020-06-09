<?php

namespace App\Repositories;

//use Your Model
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;


/**
 * Class BaseRepository.
 *
 * @package App\Repositories
 *
 * !Репозиторий для работы с сущностью
 * !Может выдавать наборы данных
 * !Не может создавать/изменять сущности
 */
abstract class BaseRepository
{
    /**
     * @var Model
     */
    protected $model;

    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * @return mixed
     */
    abstract protected function getModelClass();

    /**
     * @return Model|Application|mixed
     */
    protected function startConditions()
    {
        return clone $this->model; // экономим память
    }


}
