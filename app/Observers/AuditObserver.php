<?php

namespace App\Observers;

class AuditObserver
{
    public function created($model){
        \App\Models\AuditLog::create([
            'admin_id'=>auth('admin')->id(),
            'event_type'=>'created',
            'model_type'=>class_basename($model),
            'model_id'=>$model->id,
            'new_values'=>$model->toJson(),
            'ip_address'=>request()->ip()
        ]);
    }
}
