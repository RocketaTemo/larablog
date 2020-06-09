<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryObserver
{
    /**
     * Handle the blog category "created" event.
     * Обраточик запускается после создания записи
     *
     * @param Category $category
     * @return void
     */
    public function created(Category $category)
    {
        //Обраточик
    }

    /**
     * @param Category $category
     */

    public function creating(Category $category)
    {
        //dd(__METHOD__, $blogCategory->isDirty()); isDirty() or getDirty() была ли модель редактирована
        // после последнего запроса

        $this->setAlias($category);
    }

    protected function setAlias(Category $category): void
    {
        if (empty($category->alias)) {
            $category->alias = str_slug($category->title);
        }
    }

    /**
     * Handle the blog category "updated" event.
     * Обраточик запускается ДО обновления записи в бд
     *
     * @param Category $category
     * @return void
     */
    public function updating(Category $category)
    {
        $this->setAlias($category);
        //if will be return false -> data will not save in db
    }

    /**
     * Handle the blog category "updated" event.
     * Обраточик запускается после обновления записи
     *
     * @param Category $category
     * @return void
     */
    public function updated(Category $category)
    {
        //Обраточик
    }

    /**
     * Handle the blog category "deleted" event.
     * Обраточик запускается после "SoftDeletes" удаления записи
     *
     * @param Category $category
     * @return void
     */
    public function deleted(Category $category)
    {
        //Обраточик
    }

    /**
     * Handle the blog category "restored" event.
     *
     * @param Category $category
     * @return void
     */
    public function restored(Category $category)
    {
        //Обраточик
    }

    /**
     * Handle the blog category "force deleted" event.
     * Обраточик запускается после полного удаления записи из БД.
     *
     * @param Category $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        //Обраточик
    }
}
