<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector_Economico extends Model
{
    protected $table = 'sector_economicos';
    protected $primaryKey = 'id_sector_economico';
    protected $fillable = ["nombre"];

    public function retos()
    {
        return $this->belongsToMany(Reto::class,'reto_sector_economico', 'id_sector_economico','id_reto');
    }
}
