<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestLetter extends Model
{
    protected $guarded = [];

    public function request_forms()
    {
        return $this->belongsToMany('App\RequestForm');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function letter(){
        return $this->belongsTo('App\Letter');
    }
}
