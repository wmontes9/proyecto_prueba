<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $table = "modulos";
    protected $primaryKey = "id_modulo";

    public function permisos(){
        return $this->hasMany(Permiso::class, 'id_modulo');
    }
}
