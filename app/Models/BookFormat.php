<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookFormat extends Model
{
    use HasFactory;

    protected $table = 'book_formats';
    protected $guarded = ['created_at'];

}
