<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Readmaterial extends Model
{
    protected $fillable = [
        'language','author','category','subcategory','title','attach_file','attach_thumbnail','attach_pic1','attach_pic2','murli_date','class_date','publish_date','note','note_label','remark','ishome','status','isbig','inserted_by','updated_by','isRecommended'
    ];

    public function authors()
    {
        return $this->belongsTo(Speaker::class, 'author')->select(['id', 'name']);
    }

    public function categorys()
    {
        return $this->belongsTo(Pdfcategory::class, 'category')->select(['id', 'category_name']);
    }

    public function subcategorys()
    {
        return $this->belongsTo(Pdfsubcategory::class, 'subcategory')->select(['id', 'subcategory_name']);
    }
}

