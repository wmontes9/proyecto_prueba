<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solucion extends Model
{
    protected $table = "soluciones";

    protected $fillable = ["id_reto","titulo","justificacion","planteamiento","image_solucion","referencias","estado"];
    protected $primaryKey = 'id_solucion';
    public function reto(){
        return $this->belongsTo(Reto::class,'id_reto');
    }
    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'solucion_usuarios', 'id_solucion', 'id_usuario');
    }
}
