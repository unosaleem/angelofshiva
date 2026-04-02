<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends BaseModel
{
     protected $fillable = [
        'title','date','ishome','isnew'
    ];
}
