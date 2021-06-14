<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model{

    protected $guarded = ['id','created_at'];
    protected $table = 'districts';

    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }
}
