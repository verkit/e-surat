<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $guarded = [];

    public function letters()
    {
        return $this->belongsToMany('App\Letter');
    }
}
