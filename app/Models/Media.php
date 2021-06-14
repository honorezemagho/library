<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model{
    protected $guarded = ['created_at'];
    protected $table= 'medias';

    public function mediable(){
        /*__FUNCTION__ pour passer exactement <?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model{
    protected $guarded = ['created_at'];
    protected $table= 'medias';

    public function mediable(){
        /*__FUNCTION__ pour passer exactement le nom de la fonction en1er parametre*/
        return $this->morphTo(__FUNCTION__,'type_media','media_id'); //
    }
}
