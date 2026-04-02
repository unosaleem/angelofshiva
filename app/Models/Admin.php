<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Traits\Auditable;

class Admin extends Authenticatable
{
    use Notifiable, HasRoles, Auditable;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guard_name = 'admin';


    protected $fillable = ['name','email','password'];
}
