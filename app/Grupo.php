<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = "grupos";
    protected $primaryKey = "id_grupo";

    public function permisos()
    {
        return $this->belongsToMany(Permiso::class,'grupo_permiso', 'id_grupo', 'id_permiso');
    }
    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'usuario_grupo', 'id_grupo', 'id_usuario')->withPivot('id_institucion');
    }
    public function instituciones()
    {
        return $this->belongsToMany(Institucion::class, 'usuario_grupo', 'id_grupo', 'id_institucion');
    }

}
