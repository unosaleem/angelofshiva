<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{

    public function admin()
    {
        return $this->belongsTo(\App\Models\Admin::class);
    }

     public function getOldValuesAttribute($value)
    {
        return $value ? json_decode($value, true) : null;
    }
}
