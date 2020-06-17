<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = "permisos"; 
    protected $primaryKey = "id_permiso";
    protected $hidden = ['clave'];

    public function grupos()
    {
        return $this->belongsToMany(Grupo::class, 'grupo_permiso', 'id_permiso', 'id_grupo');
    }
}
