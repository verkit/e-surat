<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestForm extends Model
{
    protected $guarded = [];

    public function request_letters()
    {
        return $this->belongsToMany('App\RequestLetter');
    }
}
