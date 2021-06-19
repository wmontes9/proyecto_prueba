<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    protected $table = "galerias";
    protected $primaryKey = "id";
    public $fillable = ['id_usuario','descripcion','url_imagen','estado'];
    
    public function usuarios()
    {
        return $this->belongsTo(User::class,'id_usuario');
    }
}
