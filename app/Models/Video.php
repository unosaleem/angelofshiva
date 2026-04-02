<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
     protected $fillable = [
        'language','speaker','category','subcategory','title','description','videourl','murli_date','publish_date','class_date','video_thumb','status','ishome'
    ];
    public function speaker1()
    {
        return $this->belongsTo(Speaker::class, 'speaker1_id')->select(['id', 'name']);
    }

    public function speaker2()
    {
        return $this->belongsTo(Speaker::class, 'speaker2_id')->select(['id', 'name']);
    }

    public function category()
    {
        return $this->belongsTo(Videocategory::class, 'category_id')->select(['id', 'category_name','setforall_audio']);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id')->select(['id', 'subcategory_name']);
    }
}
