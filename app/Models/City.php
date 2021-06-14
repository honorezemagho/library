<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model{
    protected $guarded = ['id','created_at'];
    protected $table = 'cities';

    public function country(){
        return $this->belongsTo(Country::class,'country_id');
    }

    public function districts(){
        return $this->hasMany(District::class,'city_id');
    }
}
