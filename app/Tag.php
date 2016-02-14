<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name',
    ];

    /**
     * Get the bookmarks for the tag
     */
    public function bookmarks()
    {
        return $this->belongsToMany('App\Bookmark');
    }

    /**
     * Get the user that owns the tag
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
