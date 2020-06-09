<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {

        return $this->hasMany('App\Models\Posts');
    }

    /**
     * A user can have many roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_user');
    }

    public function isAdmin()
    {
        return $this->roles()->where('title', 'admin')->exists();
    }

    public function isModer()
    {
        $user = $this->roles()->where('title', 'moder')->exists();
        if ($user) return true;
    }

    public function isGuest()
    {
        $user = $this->roles()->where('title', 'user')->exists();
        if ($user) return true;
    }

}
