<?php

namespace App\Http\Middleware;

use App\Modulo;
use App\Permiso;
use App\Grupo;
use Closure;
use Illuminate\Support\Facades\Auth;

class VerificarPermisos
{    
    protected $metodos = [
        'leer' => 'GET',
        'crear' => 'POST',
        'actualizar' => 'PUT/PATCH', 
        'eliminar' => 'DELETE'
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {    
        // dd($this->consultarClavePermisos('instituciones','leer'));
        if(Auth::user()->roles->pluck('nombre')->contains('Administrador')){
            return $next($request);
        }
        return (!empty($this->validarPermiso(
            $this->obtenerRolesUsuario(Auth::user()),
            $this->consultarClavePermisos($this->obtenerModulo(
                $this->urlArr($request->path()))[0],
                $this->definirMetodo($request->method()))))
                )? $next($request) : $this->validarPeticionAsincrona($request);
    }
    public function urlArr($path)
    {
        return explode('/',$path);
    }
    public function obtenerModulo($arrPath)
    {        
        return array_filter($arrPath,function ($modulo){
            return !empty(Modulo::where('nombre','=',$modulo)->get()->toArray());
        });
    }    
    public function obtenerRolesUsuario($auth)
    {
        return (!empty($auth->roles->toArray()[0]))? $auth->roles[0] : null;
    }
    public function consultarClavePermisos($modulo,$metodo)
    {
        return Permiso::whereHas('grupos')->where('clave','=',$metodo.'_'.$modulo)->get()->toArray();        
    }
    public function validarPermiso($grupo, $permiso)
    {
        return Grupo::whereHas('permisos',function($query) use($permiso){
            $query->where('permisos.id_permiso','=',(!empty($permiso)) ? $permiso[0]["id_permiso"] : null );
        })->where('nombre','=',(!empty($grupo)) ? $grupo->nombre : null)->get()->toArray();
    }
    public function definirMetodo($metodoPeticion)
    {
        foreach($this->metodos as $clave => $metodo){
            if(strpos($metodo,$metodoPeticion) !== false){
                return $clave;
            }
        }        
    }
    public function validarPeticionAsincrona($request)
    {
        return redirect()->route('home');
    }
}
