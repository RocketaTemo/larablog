<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
    protected $fillable = [
        'id',
        'title',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class); //relationships
    }
}
