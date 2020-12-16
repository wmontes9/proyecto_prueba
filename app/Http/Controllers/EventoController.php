<?php

namespace App\Http\Controllers;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use App\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.Eventos.index");
    }
    public function getEventos(){
        $eventos = Evento::all()->toArray();
        $data = $eventos;
        return  response()->json($data,200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Eventos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evento = new Evento;        
        $file = $request->url_imagen->store('public/imgEvento');     
        $nombre = explode('/',$file);
        $evento->titulo = $request->titulo;
        $evento->subtitulo = $request->subtitulo;
        $evento->descripcion = $request->descripcion;
        $evento->lugar = $request->lugar;
        $evento->fecha = $request->fecha;
        $evento->objetivo = $request->objetivo;
        $evento->ponentes = $request->ponentes;
        $evento->estado = 'false';
        $evento->url_imagen=$nombre[2];
        $evento->save();
        //$reto->usuarios()->sync(Auth::user()->id_usuario);
        return view('admin.Eventos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $evento = Evento::findOrFail($id);  
        if($request->hasFile('url_imagen')){
             Storage::delete('public/imgEvento/'.$evento->url_imagen);
             $file = $request->file('url_imagen')->store('public/imgEvento');
             $nombre = explode('/',$file);
             if($file){
                 $evento->url_imagen = $nombre[2];
             }
        }   
         $evento->titulo = $request->titulo;
         $evento->subtitulo = $request->subtitulo;
         $evento->descripcion = $request->descripcion;
         $evento->lugar = $request->lugar;
         $evento->fecha = $request->fecha;
         $evento->objetivo = $request->objetivo;
         $evento->ponentes = $request->ponentes;
         $evento->estado = $request->estado;
         $evento->save();
         return redirect('eventos');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroyer($evento)
    {
        $event = Evento::findOrFail($evento);  
        $event->estado = 'false';
        $event->save();
        return;
    }
}
