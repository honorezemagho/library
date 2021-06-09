<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'book_reservations';
    protected $guarded = ['created_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function book(){
        return $this->belongsTo(BookItem::class, "book_item_id");
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

}
