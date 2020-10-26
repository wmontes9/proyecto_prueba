<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solucion extends Model
{
    protected $table = "soluciones";

    protected $fillable = ["id_reto","titulo","justificacion","planteamiento","image_solucion","referencias","estado"];

    public function reto(){
        return $this->belongsTo(Reto::class,'id_reto');
    }
    protected $primaryKey = 'id_solucion';
}
