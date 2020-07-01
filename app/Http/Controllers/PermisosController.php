<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupo;
use App\Permiso;

class PermisosController extends Controller
{
    public function index()
    {
        return view('admin.permisos.index',[
            'grupos' => Grupo::all(),
            'permisos' => Permiso::all()
        ]);
    }
    public function listaPermisosPorGrupo($id)
    {
        return Grupo::findOrFail($id)->permisos;
    }
    public function asignar(Request $request)
    {           
        Grupo::findOrFail($request->grupo)
            ->permisos()->sync(Permiso::find($request->permiso),false);    
        return redirect()->route('permisos');
    } 
    public function remover(Request $request)
    {
        $data = $request->validate([
            'grupo' => 'required|integer',
            'permiso' => 'required|array'
        ]);        
        Grupo::findOrFail($data['grupo'])
            ->permisos()->detach($data['permiso']);
        return redirect()->route('permisos');
    }   
}
