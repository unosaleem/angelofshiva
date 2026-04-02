<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
     protected $fillable = [
        'name','email','subscribe','language','remark','menu_id','date','status'
    ];
}
