<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use SoftDeletes;
    public $table ='posts';
    protected $fillable = [
        'title',
        'alias',
        'category_id',
        'excerpt',
        'content_raw',
        'is_published',
        'published_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class); //relationships
    }

    public function category()
    {
        return $this->belongsTo(Category::class); //relationships
    }
}
