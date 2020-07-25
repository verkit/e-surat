<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    protected $table = "letters";

    protected $guarded = [];

    public function forms()
    {
        return $this->belongsToMany('App\Form', 'letter_forms', 'letter_id', 'form_id');
    }

    public function request_letter(){
        return $this->hasMany('App\RequestLetter');
    }
}
