<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{

    protected $table = 'reports';
    protected $guarded = ['created_at'];

    //Make it available in the json response
    protected $appends = ['model_name'];

    //implement the attribute
    public function getModelNameAttribute()
    {
        return 'Report';
    }
    public function authors(){
        return $this->morphToMany(Author::class,'author_work');
    }

    public function views(){
    return $this->morphMany(View::class,'view');
    }

    public function level(){
        return $this->belongsTo(Level::class);
    }

    public function field(){
        return $this->belongsTo(Field::class);
    }

}
