<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookSerie extends Model
{
    use HasFactory;

    protected $guarded = ['created_at'];
    protected $table = ['book_series'];
 
}
