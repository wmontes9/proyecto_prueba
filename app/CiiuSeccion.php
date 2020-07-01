<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CiiuSeccion extends Model
{
    protected $table = "ciiu_secciones";
    protected $primaryKey = "id_seccion";

    public function divisiones()
    {
        return $this->hasMany(CiiuDivision::class, 'id_seccion');
    }
}
