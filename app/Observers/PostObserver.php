<?php

namespace App\Observers;

use App\Models\Post;
use Carbon\Carbon;

class PostObserver
{
    /**
     * Обраточик запускается ПЕРЕД созданием записи
     *
     * @param Post $post
     */
    public function creating(Post $post): void
    {
        $this->setPublishedAt($post);
        $this->setAlias($post);
        $this->setHtml($post);
        $this->setUser($post);
    }

    /**
     * Обраточик запускается ПЕРЕД обновлением записи
     *
     * @param Post $post
     */
    public function updating(Post $post): void
    {
        // $post->isDirty() - узнаем изменялась ли модель
        // $post->isDirty('is_published') - изменялось ли конкретное поле
        // $post->getAttribute() - получаем значение которое сейчас будет записано в базу
        // $post->getOriginal() - значение которое было перед сохранением в базе
        $this->setPublishedAt($post);
        $this->setAlias($post);

    }

    /**
     * Handle the blog post "created" event.
     *
     * @param Post $post
     * @return void
     */
    public function created(Post $post): void
    {
        //
    }

    /**
     * Handle the blog post "updated" event.
     *
     * @param Post $post
     * @return void
     */
    public function updated(Post $post): void
    {
        //
    }

    /**
     * @param Post $post
     */
    public function deleting(Post $post)
    {
        //  dd(__METHOD__, $post);
        //  return false; // ничего не произойдет
    }

    /**
     * Handle the blog post "deleted" event.
     *
     * @param Post $post
     * @return void
     */
    public function deleted(Post $post): void
    {
        //  dd(__METHOD__, $(post);
    }

    /**
     * Handle the blog post "restored" event.
     *
     * @param Post $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the blog post "force deleted" event.
     *
     * @param Post $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }

    /**
     * Если дата публикации не установлена, то устанавливаем дату публикации на текущую
     *
     * @param Post $post
     */

    protected function setPublishedAt(Post $post): void
    {

        if (empty($post->published_at) && $post->is_published) {
            $post->published_at = Carbon::now();
        }
    }

    /**
     * Если поле алиас пустое, то заполеняем его конвертацией заголовка.
     *
     * @param Post $post
     */

    protected function setAlias(Post $post): void
    {
        if (empty($post->alias)) {
            $post->alias = str_slug($post->title); // генерация ЧПУ
        }

    }

    /**
     * Утсановка значения полю content_html относительно поля content_raw
     *
     * @param Post $post
     */
    protected function setHtml(Post $post): void
    {
        if ($post->isDirty('content_raw')) { // это поле изменено? dirty
            //markdown
            $post->content_html = $post->content_raw;
        }
    }

    /**
     * Если не указан user_id, то утсанавливаем пользователя по умолчанию
     *
     * @param Post $post
     */

    protected function setUser(Post $post): void
    {
        $post->user_id = auth()->id() ?? $post::UNKNOWN_USER;
    }
}
