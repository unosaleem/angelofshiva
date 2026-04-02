<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'language','category_type','category_type2','class_series','category_name','category_url','title','image','remark','setforall_audio','iscompleted','attach_file1','attach_file2','attach_label1','attach_label2','other_group','sort_level','ref_id'
    ];
}
