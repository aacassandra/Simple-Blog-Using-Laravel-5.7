<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
      'post_id','user_id','message'
    ];
    //Point A: config dependencies for {hasMany} function from model post
    Public function post()
    {
      return $this->belongsTo(Post::class);
    }

    Public function user()
    {
      return $this->belongsTo(User::class);
    }
}
