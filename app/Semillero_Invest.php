<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semillero_Invest extends Model
{
    protected $table  = "semillero_invests";

    protected $fillable = ["nombre","sigla","logo"];
    
    public function usuarios()
    {
    	return $this->belongsToMany(User::class, 'usuario_grupo', 'id_semillero', 'id_usuario');
    }
    public function sublineas_investigacion()
    {
    	return $this->belongsToMany(Sub_Linea_Invest::class, 'sub_linea_semilleros', 'id_semillero', 'id_sub_linea');
    }
}
