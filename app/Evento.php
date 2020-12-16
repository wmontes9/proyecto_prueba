<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = "eventos";
    protected $primaryKey = "id";
    public $fillable = ['titulo','subtitulo','descripcion','lugar','fecha','objetivo','ponentes','estado'];
}
