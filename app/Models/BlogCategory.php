<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use SoftDeletes; //для deleted_at

    protected $fillable = [ //колонки, которые разрешаем заполнять
        'title',
        'alias',
        'parent_id',
        'description',
    ];
}
