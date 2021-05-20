<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';
    protected $guarded = ['created_at'];

    public function author(){
        return $this->belongsTo(Author::class);
    }

    public function level(){
        return $this->belongsTo(Level::class);
    }

    public function field(){
        return $this->belongsTo(Field::class);
    }

    public function period(){
        return $this->belongsTo(Period::class);
    }
}
