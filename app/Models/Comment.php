<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'blog_id','comment_desc','name','email','mobile','status'
    ];
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

}
