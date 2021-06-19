<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evidencia extends Model
{
    protected $table = "evidencias";
    protected $primaryKey = "id";
    public $fillable = ['id_evento','nombre','descripcion','url_evidencia','estado'];

    public function eventos()
    {
        return $this->belongsTo(Evento::class,'id_evento');
    }
}
