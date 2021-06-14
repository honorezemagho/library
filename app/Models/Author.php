<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';
    protected $guarded = ['created_at'];

    public function works(){
        return $this->morphToMany(AuthorWork::class, 'author_work');
    }
}
