<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CiiuDivision extends Model
{
    protected $table = "ciiu_divisiones";
    protected $primaryKey = "id_division";

    public function seccion()
    {
        return $this->belongsTo(CiiuSeccion::class, 'id_seccion');
    }
    public function grupos()
    {
        return $this->hasMany(CiiuGrupo::class,'id_division');
    }
}
