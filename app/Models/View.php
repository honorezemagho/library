<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at'];
    protected $table = "views";

    //Means that we can known the view of a work and the information about the user
    public function viewable(){
        return $this->morphTo(__FUNCTION__,'view_type','view_id'); //
    }
}
