<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    protected $table = 'instituciones';
    protected $primaryKey = 'id_institucion';
    protected $with = ['actividades'];

    public function actividades()
    {
        return $this->belongsToMany(CiiuClase::class, 'acti_economica', 'id_institucion', 'id_clase')
            ->withPivot('codigo','tipo');
    }
    public function municipio()
    {
        return $this-> belongsToMany(Municipio::class,'sede')->withPivot('Nombre', 'Direccion', 'Telefono')->withTimestamps();
    }
    public function usuarios(){
        return $this->belongsToMany(User::class,'usuario_grupo','id_institucion','id_usuario');
    }
    public function grupos()
    {
        return $this->belongsToMany(Grupo::class, 'usuario_grupo', 'id_institucion', 'id_grupo');
    }

}
