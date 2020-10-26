<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AliadosEstrategicos extends Model
{
    protected $table = 'aliados_estrategicos';
    protected $fillable = ['nombre','descripcion','logo','created_at','url'];
    //protected $guarded = [];

    //Scope

   

}
