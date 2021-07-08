<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = "comentarios";
    protected $primaryKey = "id";
    public $fillable = ['id_usuario','descripcion','estado'];
    
    public function usuarios()
    {
        return $this->belongsTo(User::class,'id_usuario');
    }
}
