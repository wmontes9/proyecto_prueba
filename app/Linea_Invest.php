<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linea_Invest extends Model
{
    protected $table = "linea_invest";

    protected $fillable = ["id_grupo_invest","nombre","descripcion"];

    public function grupo_investigacion(){
        return $this->belongsTo(Grupo_Invest::class);
    }
    public function sublineas(){
    	return $this->hasMany(Sub_Linea_Invest::class);
    }
}
