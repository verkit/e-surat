<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyCard extends Model
{
    protected $guarded = [];

    public function member(){
        return $this->hasMany('App\MemberFamilyCard');
    }

    public function signature(){
        return $this->belongsTo('App\VillageAdministrator');
    }
}
