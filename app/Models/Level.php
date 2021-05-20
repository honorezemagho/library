<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model{

    protected $guarded = ['id','created_at'];
    protected $table = "levels";
}
