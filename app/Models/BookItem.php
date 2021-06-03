<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookItem extends Model
{
    use HasFactory;

    protected $table = 'book_items';
    protected $guarded = ['created_at'];
 
    public function format(){
        return $this->belongsTo(BookFormat::class,'book_format');
    }
}
