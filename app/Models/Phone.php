<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    protected $guarded = ['created_at'];
    protected $table= 'phones';

    public function phonable(){
        /*__FUNCTION__ pour passer exactement le nom de la fonction en1er parametre*/
        return $this->morphTo(__FUNCTION__,'type_phone','phone_id'); //
    }
}
