<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model{

    protected $guarded = ['id','created_at'];
    protected $table= 'countries';

    public function cities(){
        return $this->hasMany(City::class,'country_id');
    }


    /*permet d'obtenir tous les quartiers d'un pays en utilisant
    la relation qui existe entre Ville et Quartier*/
    public function district(){
        /*1er param est le nom du model final auquel on souhaite acceder
        2nd param est le model intermediare
        3e param est le nom de la cle etrangère (pays_id) sur le modèle intermediare (Ville)
        4e param est le nom de la cle etrangère sur le modèle final (Quartier)*/
        return $this->hasManyThrough(District::class,Cities::class,'country_id','city_id');
    }

}
