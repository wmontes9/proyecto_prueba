<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    public $table = 'contactos';
	 
	public $fillable = ['name','email','phone','message'];
}
