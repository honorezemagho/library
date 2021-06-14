<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DDCInteger extends Model
{
    use HasFactory;

    protected $table = 'ddc_integers';
    protected $guarded = ['created_at'];

}
