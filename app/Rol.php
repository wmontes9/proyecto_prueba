<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id_rol';

    public function usuarios()
    {        
        return $this->belongsToMany(User::class, 'usuario_rol', 'id_rol', 'id_usuario');
    }
}
