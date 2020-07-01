<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Rol;
use Session;
class RolController extends Controller
{
    /**
     * obtener roles
     * @return \App\Rol
     */
    public function getRoles()
    {
        $nombre = "";
        return Rol::all();
    }
    /**
     * Verificar el rol a cambiar
     * si se encuentra dentro de los roles del 
     * usuario logeado
     * @return mixed  
     */    
    public function verificarRol($user_roles, $rol_cambiar)
    {
        foreach ($user_roles as $rol) {
            if($rol->id_rol == $rol_cambiar){
                Session::put("rolActual",$rol->id_rol);        
            }
        }
        return;
    }
    /**
     * Verificar Rol usuario 
     * @param Request $request
     */
    public function cambiarRolSesion(Request $request){
        //dd(Auth::user()->roles);
        //Session::put("reto",$id);
        $this->verificarRol(Auth::user()->roles, $request->rol);
        //dd(Session::get("rolActual"));
        return; $request->session()->put('rolActual',$this->verificarRol(Auth::user()->roles, $request->rol));    
    }

}
