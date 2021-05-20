<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';
    protected $name = 'Report';
    protected $guarded = ['created_at'];

    public function modelName(){
        return 'Report';
    }

    public function authors(){
        return $this->morphToMany(Author::class,'author_work');
    }

    public function level(){
        return $this->belongsTo(Level::class);
    }

    public function field(){
        return $this->belongsTo(Field::class);
    }

}
