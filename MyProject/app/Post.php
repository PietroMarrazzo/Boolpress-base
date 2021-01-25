<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //mass assign
    protected $fillable = [
        'title',
        'description',
        'slug',
        'path_img'
    ];
}
