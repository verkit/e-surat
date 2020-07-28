<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberFamilyCard extends Model
{
    protected $guarded = [];

    public function family_card(){
        return $this->hasMany('App\FamilyCard');
    }

    public function gender(){
        return $this->belongsTo('App\Gender');
    }

    public function marital_status(){
        return $this->belongsTo('App\MaritalStatus');
    }
}
