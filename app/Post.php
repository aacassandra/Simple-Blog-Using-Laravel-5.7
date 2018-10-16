<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','user_id' , 'content', 'category_id', 'slug'];

    Public function category()
    {
      return $this->belongsTo(Category::class);
    }

    //1 post bisa untuk banyak komentar{hasMany}
    //Jika menggunakan {hasMany} jangan lupa
    //setel juga belongsTo di model comment seperti Point A
    Public function comments()
    {
      return $this->hasMany(Comment::class);
    }

    Public function user()
    {
      return $this->belongsTo(User::class);
    }
}
