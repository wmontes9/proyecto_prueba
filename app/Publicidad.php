<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicidad extends Model
{
    protected $table = 'publicidads';
    protected $fillable = ["Titulo","Contenido"];

    /*public function publicidad()
    {
        return $this->hasMany('App\Publicidad');
    }*/
}
