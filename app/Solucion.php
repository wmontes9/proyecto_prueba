<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solucion extends Model
{
    protected $table = "soluciones";

    protected $fillable = ["id_reto","titulo","justificacion","planteamiento","image_solucion","referencias","estado"];

    public function retos(){
    	return $this->belongsTo("App\Reto");
    }
    protected $primaryKey = 'id_solucion';
}
