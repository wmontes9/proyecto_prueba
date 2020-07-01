<?php

namespace App\Http\Controllers;

use App\Grupo_Invest;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GrupoInvestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/Grupo_Invest.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verificarRol()
    {
        return (Auth::user()->roles->pluck('nombre')->contains('Admministrador')) ? true : false;
    }
    public function getListaGrupos()
    {
        if($this->verificarRol()){
            return Grupo_Invest::all()->toJson();
        } else {
            return Auth::user()->Grupo_Invest->toJson();
        }
    }  
    public function guardarGrupoNuevo(Request $request)
    {
        $grupo = new Grupo_Invest;        
        $file = $request->logo->store('public/imgGrupo');        
        $nombre = explode('/',$file);
        $grupo->sigla = $request->sigla;
        $grupo->nombre = $request->nombre;
        $grupo->logo=$nombre[2];
        $grupo->save();

        //$grupo->usuarios()->sync(Auth::user()->id_usuario);
        
        return redirect()->back();
    }
    /*public function actualizarGrupo(Request $request, $id)
    {
        $grupo = Grupo_Invest::findOrFail($id);        
        if($request->hasFile('logo')){
            Storage::delete('public/imgGrupo/'.$grupo->logo);
            $file = $request->file('logo')->store('public/imgGrupo');
            $nombre = explode('/',$file);
            if($file){
                $grupo->logo = $nombre[2];
            }
        }        
        
        $grupo->sigla = $request->sigla;
        $grupo->nombre = $request->nombre;
        
        $grupo->save();
        return redirect('admin/grupo');
    }*/
    /*public function eliminarGrupo($id)
    {        
        $grupo = Grupo_Invest::findOrFail($id);
        Storage::delete('public/imgGrupo/'.$grupo->logo);
        //$grupo->usuarios()->detach();
        $grupo->delete();
        return;
    }*/
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grupo_Invest  $grupo_Invest
     * @return \Illuminate\Http\Response
     */
    public function show(Grupo_Invest $grupo_Invest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grupo_Invest  $grupo_Invest
     * @return \Illuminate\Http\Response
     */
    public function edit(Grupo_Invest $grupo_Invest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grupo_Invest  $grupo_Invest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $grupo = Grupo_Invest::findOrFail($id);        
        if($request->hasFile('logo')){
            Storage::delete('public/imgGrupo/'.$grupo->logo);
            $file = $request->file('logo')->store('public/imgGrupo');
            $nombre = explode('/',$file);
            if($file){
                $grupo->logo = $nombre[2];
            }
        }        
        
        $grupo->sigla = $request->sigla;
        $grupo->nombre = $request->nombre;
        
        $grupo->save();
        return redirect('admin/grupo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grupo_Invest  $grupo_Invest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grupo = Grupo_Invest::findOrFail($id);
        Storage::delete('public/imgGrupo/'.$grupo->logo);
        //$grupo->usuarios()->detach();
        $grupo->delete();
        return;
    }
    /**
     * Consulta grupo de investigacion 
     * por sigla
     * 
     * @param String $sigla
     * @return Array
     */
    public function consultaGrupo($sigla)
    {
        return Grupo_Invest::where('sigla', 'like', "%$sigla%")->get()->toArray();
    }
}
