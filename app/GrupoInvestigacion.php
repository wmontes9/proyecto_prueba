<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoInvestigacion extends Model
{
    protected $table = "grupo_invests";
    protected $primaryKey = "id";
    protected $fillable = ["nombre","sigla","logo"];

    public function linea(){
    	return $this->hasMany('App\Linea_Invests');
    }
}
