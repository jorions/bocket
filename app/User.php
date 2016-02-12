<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the bookmarks for the user
     */
    public function bookmarks()
    {
        $this->hasMany('App\Bookmark');
    }

    /**
     * Get the tags for the user
     */
    public function tags()
    {
        $this->hasMany('App\Tag');
    }


}