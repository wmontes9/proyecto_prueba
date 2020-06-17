<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_Linea_Invest extends Model
{
    protected $table = "sub_linea_invest";

    protected $fillable = ["id_linea_invest","nombre","descripcion"];

    public function linea_investigacion()
    {
        return $this->belongsTo(Linea_Invest::class);
    }
    public function sublineasemillero()
    {
    	return $this->belongsToMany(Semillero_Invest::class, 'sub_linea_semilleros', 'id_sub_linea', 'id_semillero');
    }
   
}
