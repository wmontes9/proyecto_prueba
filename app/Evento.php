<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = "eventos";
    protected $primaryKey = "id";
    public $fillable = ['id_usuario','titulo','subtitulo','descripcion','lugar','fecha_inicio','fecha_fin','objetivo','ponentes','url_image','url_evento','estado'];
    
    public function usuarios()
    {
        return $this->belongsTo(User::class,'id_usuario');
    }

    public function evidencias()
    {
        return $this->hasMany(Evidencia::class, 'id_evento');
    }
}
