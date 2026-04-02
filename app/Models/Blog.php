<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
       'category','post_lable','post_detail','blog_heading','blog_description','publish_date', 'status','isblog'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
