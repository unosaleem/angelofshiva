<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pdfsubcategory extends Model
{
     protected $fillable = [
        'category_id','subcategory_name','image','remark','attach_file1','attach_file2'
    ];
}
