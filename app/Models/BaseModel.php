<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Observers\AuditObserver;

abstract class BaseModel extends Model
{
    protected static function booted()
    {
        static::observe(AuditObserver::class);
    }
}
