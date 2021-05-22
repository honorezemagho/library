<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $guarded = ['created_at'];

    //Add extra attribute
    protected $attributes = ['model_name'];

    //Make it available in the json response
    protected $appends = ['model_name'];

    //implement the attribute
    public function getModelNameAttribute()
    {
        return 'Book';
    }

    public function format(){
        return $this->belongsTo(BookFormat::class,'book_format');
    }

   /*return the authors of a book*/
   public function authors(){
        return $this->morphToMany(Author::class,'author_work');
    }

    public function type(){
        return $this->belongsTo(BookType::class,'book_type_id');
    }

    public function publisher(){
        return $this->belongsTo(Publisher::class,'publisher_id');
    }

    public function dd_integer(){
        return $this->belongsTo(DDCInteger::class,'ddc_integer_id');
    }

    public function dd_decimal(){
        return $this->belongsTo(DDCDecimal::class,'ddc_decimal_id');
    }
    



}
