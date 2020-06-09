<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes; //для deleted_at

    protected $fillable = [ //колонки, которые разрешаем заполнять
        'title',
        'alias',
        'parent_id',
        'description',
    ];

//    public function getParentCategory()
//    {
//        return $this->belongsTo(Category::class, 'parent_id', 'id');
//    }

//    public function post()
//    {
//        return $this->morphedByMany(Post::class, 'posts'); //relationships
//    }

}
