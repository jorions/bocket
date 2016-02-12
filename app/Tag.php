<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * Get the bookmarks for the tag
     */
    public function bookmarks()
    {
        $this->belongsToMany('App\Bookmark');
    }

    /**
     * Get the user that owns the tag
     */
    public function user()
    {
        $this->belongsTo('App\User');
    }
}
