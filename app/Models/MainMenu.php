<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainMenu extends Model
{
    protected $table = 'main_menus-new';

    protected $fillable = [
        'title',
        'slug',
        'sort_level',
        'ref_id',
        'status'
    ];

    // Parent
    public function parent()
    {
        return $this->belongsTo(MainMenu::class, 'ref_id');
    }

    // Children
    public function children()
    {
        return $this->hasMany(MainMenu::class, 'ref_id')
            ->where('status', 'Yes')
            ->orderBy('sort_level');
    }
}
