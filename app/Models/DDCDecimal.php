<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DDCDecimal extends Model
{
    use HasFactory;

    protected $table = 'ddc_decimals';
    protected $guarded = ['created_at'];
 
}
