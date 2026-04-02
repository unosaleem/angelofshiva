<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name','email','tel_code','mobile','city','gender','murli_deily','gyan','want_to','responce_in','message','center_name','date','status'
    ];
}
