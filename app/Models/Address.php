<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    protected $guarded = ['created_at'];
    protected $table= 'address';

    public function addressable(){
        /*__FUNCTION__ pour passer exactement le nom de la fonction en1er parametre*/
        return $this->morphTo(__FUNCTION__,'type_address','address_id'); //
    }

    public function findUser($id)
    {
        $user = User::find($id);
        $address = $user->address;
        return $address->address_id;
    }
}
