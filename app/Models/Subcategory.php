<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
     protected $fillable = [
        'category_id','subcategory_name','subcategory_url','image','setforall_audio','remark','attach_file1','attach_file2','attach_label1','attach_label2','iscompleted'
    ];
}
