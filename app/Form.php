<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $guarded = [];

    public function letters()
    {
        return $this->belongsToMany('App\Letter', 'letter_forms', 'letter_id', 'form_id');
    }

    public function req_form(){
        return $this->hasMany('App\RequestForm');
    }
}
