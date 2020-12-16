<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Grupo;
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
        return Grupo::all();
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
            if($rol->id_grupo == $rol_cambiar){
                return $rol->id_grupo;          
            }
        }
        return null;
    }

    /**
     * Verificar Rol usuario 
     * @param Request $request
     */
    public function cambiarRolSesion(Request $request){
        //dd($request->rol);
        //dd(Auth::user()->grupos);
        //dd($request->session());
        //dd($this->verificarRol(Auth::user()->grupos, $request->rol));
        //Session::put('rolActual',$this->verificarRol(Auth::user()->grupos, $request->rol));
        return $request->session()->put('rolActual',$this->verificarRol(Auth::user()->grupos, $request->rol));  
    }


}
