<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statut extends Model{
    protected $guarded = ['id','created_at'];
    protected $table= 'status';
}
