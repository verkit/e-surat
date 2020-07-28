<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KTP extends Model
{
    protected $table = "ktp";
    protected $guarded = [];

    public function religion(){
        return $this->belongsTo('App\Religion');
    }

    public function blood_type(){
        return $this->belongsTo('App\BloodType');
    }

    public function citizenship(){
        return $this->belongsTo('App\Citizenship');
    }

    public function gender(){
        return $this->belongsTo('App\Gender');
    }

    public function marital_status(){
        return $this->belongsTo('App\MaritalStatus');
    }

    public function signature(){
        return $this->belongsTo('App\VillageAdministrator');
    }
}
