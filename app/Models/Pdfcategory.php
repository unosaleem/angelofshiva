<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pdfcategory extends Model
{
    protected $fillable = [
        'language','category_type','class_series','category_name','image','remark','setforall_audio','iscompleted','attach_file1','attach_file2'
    ];
}
