<?php

namespace App\Http\Controllers;

use App\GrupoInvestigacion;
use Illuminate\Http\Request;
use App;
use DB;
use Session;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
class GrupoInvestigacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("grupoDeInvestigacion.crearVincularGrupo.ListGrupo");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getGrupoIn(){
        //dd("getArea");
        return GrupoInvestigacion::all(); //nombre clase
    }
    public function create()
    {
        dd("formulariocreargrupo");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grupo = new GrupoInvestigacion; //mirar si es el mpdelo o loa carpeta
        $grupo->sigla = $request->sigla;
        $grupo->nombre = $request->nombre;
        $file = $request->logo->store('public/imgGrupo');
        $nombre = explode('/',$file);
        $grupo->logo=$nombre[2];
        $grupo->save();
        
        return redirect('grupoinvestigacion');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GrupoInvestigacion  $grupoInvestigacion
     * @return \Illuminate\Http\Response
     */
    public function show(GrupoInvestigacion $grupoInvestigacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GrupoInvestigacion  $grupoInvestigacion
     * @return \Illuminate\Http\Response
     */
    public function edit(GrupoInvestigacion $grupoInvestigacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GrupoInvestigacion  $grupoInvestigacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $grupo = GrupoInvestigacion::findOrFail($id);
        
        if($request->hasFile('logo')){
            Storage::delete('public/imgGrupo/'.$grupo->logo);
            $file = $request->file('logo')->store('public/imgGrupo');
            //$file = $request->url_imagen_e->store('imgReto');
            $nombre = explode('/',$file);
            if($file){
                $grupo->logo = $nombre[2];
            }
           
       }
            //$grupo->id = $request->id;
            $grupo->sigla = $request->sigla;
            $grupo->nombre = $request->nombre;
           //se borro la parte de logo
            $grupo->save();
            return redirect('grupoinvestigacion');
    }

  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GrupoInvestigacion  $grupoInvestigacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($grupoInvestigacion)
    {
        $grupo = GrupoInvestigacion::findOrFail($grupoInvestigacion);
        $grupo->delete();
        $cant = 0;
        return $cant;
    }
}
