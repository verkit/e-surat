<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function villager()
    {
        return $this->hasOne('App\Villager');
    }

    public function gender()
    {
        return $this->belongsTo('App\Gender');
    }

    public function marital_status()
    {
        return $this->belongsTo('App\MaritalStatus');
    }

    public function religion(){
        return $this->belongsTo('App\Religion');
    }

    public function letter_request(){
        return $this->hasMany('App\RequestLetter');
    }

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
