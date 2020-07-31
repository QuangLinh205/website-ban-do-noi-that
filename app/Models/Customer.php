<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='customers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'email', 'password','phone_number','address',
    ];
    public function order()
    {
        return $this->hasMany('App\Models\Order','id_customer','id');
    }
    public function comment()
    {
        return $this->hasMany('App\Models\Comment','id_customer','id');
    }
    public function rating_star()
    {
        return $this->hasMany('App\Models\Rating_star','id_customer','id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
