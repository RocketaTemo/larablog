<?php

namespace App\Repositories;

use App\Models\Post as Model;


class PostRepository extends BaseRepository
{

    protected function getModelClass()
    {
        return Model::class;

        // TODO: Implement getModelClass() method.
    }

    /**
     * Возвращает модель для редактирования в админке
     *
     * @param int $id
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /* (Админка)
     * Получаем список статей для вывода во вбюхе
     *
     * @return LengthAwarePaginator
     **/
    public function getAllWithPaginate($perPage = null)
    {
        $columns = [
            'id',
            'title',
            'alias',
            'is_published',
            'published_at',
            'user_id', 'category_id'];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC') // сортировка по id в обратном порядке
//            ->with(['category', 'user'])
            ->with([// !!(Оптимизация запросов к БД) загрузка отношений для категории и юзера
                'user' => function ($query) {
                    $query->select(['id', 'name']);
                },
                'category' => function ($query) {
                    $query->select(['id', 'title']);
                }
            ])
            ->paginate(10); // 10 записей на стр.

        return $result;
    }

}
