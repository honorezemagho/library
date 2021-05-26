<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';
    protected $guarded = ['created_at'];
   
    //Make it available in the json response
    protected $appends = ['model_name'];

    //implement the attribute
    public function getModelNameAttribute()
    {
        return 'Subject';
    }

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
