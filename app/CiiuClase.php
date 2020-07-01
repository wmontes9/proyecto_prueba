<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CiiuClase extends Model
{
    protected $table = "ciiu_clases";
    protected $primaryKey = "id_clase";

    public function grupo()
    {
        return $this->belongsTo(CiiuGrupo::class, 'id_grupo');        
    }
    public function instituciones()
    {
        return $this->belongsToMany(Institucion::class,'acti_economica','id_clase','id_institucion')
            ->withPivot('codigo','tipo');
    }
}
