<?php

namespace App\Http\Controllers;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use App\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;
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
        $rolActual = Session::get('rolActual');
        if($rolActual == 6){
            $eventos = Evento::all()->toArray();
            $data = $eventos;
        }elseif($rolActual == 1){
            $eventos = DB::table('eventos')
            ->join('usuarios', 'usuarios.id_usuario', '=', 'eventos.id_usuario')
            ->join('usuario_grupo', 'usuario_grupo.id_usuario', '=', 'usuarios.id_usuario')
            ->where('usuario_grupo.id_grupo', '=', 1)
            ->select('eventos.*', 'usuario_grupo.id_grupo')
            ->get()->toArray();
            $data = $eventos;
        }
        return  $data;//response()->json($data,200);
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
        $seconds = 00;
        $fecha_inicial = $request->fecha_inicio.' '.$request->hora_inicio.':'.$request->minuto_inicio.':'.$seconds;
        $fecha_final = $request->fecha_fin.' '.$request->hora_fin.':'.$request->minuto_fin.':'.$seconds;
        $evento = new Evento;        
        $file = $request->url_imagen->store('public/imgEvento');     
        $nombre = explode('/',$file);
        $evento->id_usuario = Auth::user()->id_usuario;
        $evento->titulo = $request->titulo;
        $evento->subtitulo = $request->subtitulo;
        $evento->descripcion = $request->descripcion;
        $evento->lugar = $request->lugar;
        $evento->fecha_inicio = $request->fecha_inicio;
        $evento->fecha_fin = $request->fecha_fin;
        $evento->objetivo = $request->objetivo;
        $evento->ponentes = $request->ponentes;
        $evento->estado = 'false';
        $evento->url_imagen=$nombre[2];
        $evento->url_evento = $request->url_evento;
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
         $evento->fecha_inicio = $request->fecha_inicio;
         $evento->fecha_fin = $request->fecha_fin;
         $evento->objetivo = $request->objetivo;
         $evento->ponentes = $request->ponentes;
         $rolActual = Session::get('rolActual');
         if($rolActual == 6){
            $evento->estado = $request->estado;
         }
         $evento->url_evento = $request->url_evento;
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
