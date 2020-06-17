<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Departamento;

class Municipio extends Model
{
    protected $table = 'municipio';


    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function institucion()
    {
        return $this->belongsToMany(Institucion::class,'sede')->withPivot('Nombre', 'Direccion', 'Telefono')->withTimestamps();
    }
    
}
