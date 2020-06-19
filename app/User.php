<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "usuarios";

    protected $primaryKey = "id_usuario";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [        
        'id_municipio','nombre', 'apellido', 'tipo_documento',
        'num_identificacion', 'direccion', 'telefono',
        'email', 'password','nombre_usuario'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function municipio()
    {
        return $this->belongsTo(Municipio::class,'id_municipio');
    }
    public function grupos()
    {
        return $this->belongsToMany(Grupo::class,'usuario_grupo', 'id_usuario', 'id_grupo')->withPivot('estado','rol');
    }
    public function semilleros()
    {
        return $this->belongsToMany(Semillero_Invest::class,'usuario_grupo', 'id_usuario', 'id_semillero')->withPivot('id_semillero','estado','rol');
    }
    public function retos()
    {
        return $this->belongsToMany(Reto::class, 'reto_usuarios', 'id_usuario', 'id_reto');
    }
    public function institucion()
    {
        return $this->belongsToMany('App\Institucion');
    }
}
