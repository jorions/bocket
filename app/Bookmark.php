<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'link',
    ];

    /**
     * Get the tags for the bookmark
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    /**
     * Get the user that owns the bookmark
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
