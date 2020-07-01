<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo_Invest extends Model
{
    protected $table = "grupo_invests";

    protected $fillable = ["nombre","sigla","logo"];

    public function linea(){
    	return $this->hasMany('App\Linea_Invests');
    }
}
