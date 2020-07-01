<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CiiuGrupo extends Model
{
    protected $table = "ciiu_grupos";
    protected $primaryKey = "id_grupo";

    public function division()
    {
        return $this->belongsTo(CiiuDivision::class, 'id_division');
    }
    public function clases()
    {
        return $this->hasMany(CiiuClase::class, 'id_grupo');
    }
}
