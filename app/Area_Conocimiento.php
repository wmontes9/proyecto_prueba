<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area_Conocimiento extends Model
{
    protected $table="area_conocimientos";
    protected $primaryKey = "id_area_conocimiento";
    protected $fillable = ['nombre'];

    public function semilleros()
    {
        return $this->hasMany(Semillero_Invest::class, 'id');
    }
  
}
