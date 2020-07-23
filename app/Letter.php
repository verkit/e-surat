<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    protected $guarded = [];

    public function forms()
    {
        return $this->belongsToMany('App\Form');
    }
}
