<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    /**
     * Get the tags for the bookmark
     */
    public function tags()
    {
        $this->belongsToMany('App\Tag');
    }

    /**
     * Get the user that owns the bookmark
     */
    public function user()
    {
        $this->belongsTo('App\User');
    }
}
