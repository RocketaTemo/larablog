<?php

namespace App\Repositories;

use App\Models\Category as Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class CategoryRepository
 * @package App\Repository
 */
class CategoryRepository extends BaseRepository
{

    /**
     * @return string
     */
    public function getModelClass()
    {
        return Model::class;
    }

    /**
     * Возвращает модель для редактирования в админке
     *
     * @param int $id
     *
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Возвращает список категорий для выпадающего списка
     *
     * @return Collection
     */
    public function getForComboBox()
    {
        $columns = implode(', ', [
            'id',
            'CONCAT (id, ". ", title) AS id_title_combobox',
        ]);

        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase() // данные в виде std class, а не массива
            ->get();

        return $result;
    }

    /**
     * Возвращает все категории с пагинацией
     *
     * @param int|null $perPage
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPaginate($perPage = null)
    {
        $columns = ['id', 'title', 'parent_id'];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->paginate($perPage);

        return $result;
    }


}
