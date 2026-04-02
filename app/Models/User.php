<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'mobileusers';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'dob',
        'password',
        'pwd',
        'otp',
        'otpstatus',
        'city',
        'state',
        'postalcode',
        'aboutus',
        'country',
        'image',
        'gender',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'otp', 'pwd'
    ];

    public function getFullAddressAttribute()
    {
        return "{$this->city}, {$this->state}, {$this->country}";
    }

    public function favorites()
    {
        return $this->hasMany(\App\Models\Favorite::class);
    }

    public function activities()
    {
        return $this->hasMany(\App\Models\UserActivity::class);
    }

}
