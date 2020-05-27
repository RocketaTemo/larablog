<?php

namespace App\Repositories;

//use Your Model
use Illuminate\Database\Eloquent\Model;


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
     * @return Model|\Illuminate\Foundation\Application|mixed
     */
    protected function startConditions()
    {
        return clone $this->model; // экономим память
    }


}
