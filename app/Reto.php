<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reto extends Model
{
    protected $table = "retos";

    protected $primaryKey = 'id_reto';

    protected $fillable = ["titulo","pregunta","necesidad","causas","consecuencias","interesados","region","ubicacion","condicion_e","tiempo_e","p_solucion","alcance","condicion_fp","acciones_c","recursos_e","elementos_ps","evaluacion","url_imagen","estado"];
   
    public function soluciones()
    {
        return $this->hasMany(Solucion::class, 'id_solucion');
    }
    public function detalle_reto()
    {
    	return $this->hasMany("App\Detalle_Reto");
    }
    public function equipos()
    {
        return $this->hasMany("App\Equipo");
    }
    public function sectores()
    {
        return $this->hasMany("App\Reto_Sector_Economico");
    }
    public function Calificacion()
    {
        return $this->hasMany("App\Calificacion");
    }
    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'reto_usuarios', 'id_reto', 'id_usuario');
    }
    public function sector_economico()
    {
        return $this->belongsToMany(Sector_Economico::class,'reto_sector_economico','id_reto', 'id_sector_economico');
    }
}
