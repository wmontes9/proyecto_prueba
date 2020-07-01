<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActividadEconomica extends Model
{
    protected $table="acti_economica";
    protected $primaryKey = "id_acti_economica";

    public function institucion()
    {
        return $this->belongsTo(Institucion::class, 'id_institucion');
    }
}
