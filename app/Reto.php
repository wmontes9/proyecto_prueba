<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reto extends Model
{
    protected $table = 'retos';
    protected $fillable = ["Titulo","Pregunta"];

    /*public function reto()
    {
        return $this->hasMany('App\Reto');
    }*/
}
