<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class BookItem extends Model
{
    use HasFactory;

    protected $table = 'book_items';
    protected $guarded = ['created_at'];
 
    public function format(){
        return $this->belongsTo(BookFormat::class,'book_format');
    }

    public function status(){
        return $this->belongsTo(Status::class,'status_id');
    }
}
