<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorWork extends Model
{

    protected $table = 'author_works';
    protected $guarded = ['created_at'];

    public function author_workable(){
        return $this->morphedBy(__FUNCTION__,'type_work','work_id'); //
    }
}
