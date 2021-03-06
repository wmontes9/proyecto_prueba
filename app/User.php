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
        'num_identificacion','profesion', 'direccion', 'telefono',
        'email','twitter','facebook','instagram','linkedin','password',
        'administrador','staf','activo','mentor'
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
        return $this->belongsToMany(Grupo::class,'usuario_grupo', 'id_usuario', 'id_grupo');
    }
    public function semilleros()
    {
        return $this->belongsToMany(Semillero_Invest::class,'usuario_semillero', 'id_usuario', 'id_semillero')->withPivot('id_semillero','rol','estado');
    }
    public function retos()
    {
        return $this->belongsToMany(Reto::class, 'reto_usuarios', 'id_usuario', 'id_reto');
    }
    public function instituciones()
    {
        return $this->belongsToMany(Institucion::class,'usuario_institucion','id_usuario','id_institucion')->withPivot('rol', 'estado');
    }
    public function soluciones()
    {
        return $this->belongsToMany(Solucion::class,'solucion_usuarios','id_usuario','id_solucion');
    }
    public function eventos()
    {
        return $this->hasMany(Evento::class, 'id_usuario');
    }
    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'id_usuario');
    }
    public function galerias()
    {
        return $this->hasMany(Galeria::class, 'id_usuario');
    }
}
