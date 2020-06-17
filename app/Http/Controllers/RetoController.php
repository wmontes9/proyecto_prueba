<?php

namespace App\Http\Controllers;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Reto;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
       // $this->middleware('auth')->only('update','store');
    }
    public function index()
    {
        return view("admin.Reto.list");
        
    }
    /**
     * Obtener todos los retos 
     * formulados
     */
    public function getretos(){
        //$programas = DB::table("Programa")->select("*")->get()->toArray(); 
        //$competencias = DB::table("Competencia")->select("*")->get()->toArray(); 
        //$data = array($programas,$competencias);
        //return  response()->json($data,200);
        $retos = reto::all()->toArray();
        $data = $retos;
        return  response()->json($data,200);
    }
    /**
     * Abrir la vista de retos 
     * por usuario
     */
    public function retosUsuario()
    {
        return view('usuarios.retos.index');
    }
    /**
     * Obtener los retos para
     * el usuario autenticado
     */
    public function getRetosUsuario(){        
        return Auth::user()->retos->toJson();
    }
    public function getinfo(){
        return view("retos.list"); 
        }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd("store");
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
        $reto = new reto;        
        $file = $request->url_imagen->store('public/imgReto');        
        $nombre = explode('/',$file);
        $reto->titulo = $request->titulo;
        $reto->pregunta = $request->pregunta;
        $reto->necesidad = $request->necesidad;
        $reto->causa = $request->causa;
        $reto->consecuencia = $request->consecuencia;
        $reto->interesados = $request->interesados;
        $reto->tiempo_ejecucion = $request->tiempo_ejecucion;
        $reto->lugar = $request->lugar;
        $reto->condicion_e = $request->condicion_e;
        $reto->p_solucion = $request->p_solucion;
        $reto->alcance = $request->alcance;
        $reto->condicion_p = $request->condicion_p;
        $reto->accion = $request->accion;
        $reto->conocimiento = $request->conocimiento;
        $reto->elementos = $request->elementos;
        $reto->descripcion_s = $request->descripcion_s;
        $reto->evaluacion = $request->evaluacion;
        $reto->url_imagen=$nombre[2];
        $reto->estado="inactivo";
        $reto->save();

        $reto->usuarios()->sync(Auth::user()->id_usuario);
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reto  $reto
     * @return \Illuminate\Http\Response
     */
    public function show(Reto $reto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reto  $reto
     * @return \Illuminate\Http\Response
     */
    public function edit(Reto $reto)
    {
        dd("edit");
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reto  $reto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // dd(Str::after($file,'/'));
       $reto = reto::findOrFail($id);  
       if($request->hasFile('url_imagen_e')){
            Storage::delete('public/imgReto/'.$reto->url_imagen);
            $file = $request->file('url_imagen_e')->store('public/imgReto');
            //$file = $request->url_imagen_e->store('imgReto');
            $nombre = explode('/',$file);
            
            if($file){
                $reto->url_imagen = $nombre[2];
            }
       }   
        $reto->titulo = $request->titulo;
        $reto->pregunta = $request->pregunta;
        $reto->necesidad = $request->necesidad;
        $reto->causa = $request->causa;
        $reto->consecuencia = $request->consecuencia;
        $reto->interesados = $request->interesados;
        $reto->tiempo_ejecucion = $request->tiempo_ejecucion;
        $reto->lugar = $request->lugar;
        $reto->condicion_e = $request->condicion_e;
        $reto->p_solucion = $request->p_solucion;
        $reto->alcance = $request->alcance;
        $reto->condicion_p = $request->condicion_p;
        $reto->accion = $request->accion;
        $reto->conocimiento = $request->conocimiento;
        $reto->elementos = $request->elementos;
        $reto->descripcion_s = $request->descripcion_s;
        $reto->evaluacion = $request->evaluacion;
        $reto->save();
        return redirect('admin/retos');
    }

    public function actualizarReto(Request $request, $id)
    {
       // dd(Str::after($file,'/'));
       $reto = reto::findOrFail($id);  
       if($request->hasFile('url_imagen_e')){
            Storage::delete('public/imgReto/'.$reto->url_imagen);
            $file = $request->file('url_imagen_e')->store('public/imgReto');
            //$file = $request->url_imagen_e->store('imgReto');
            $nombre = explode('/',$file);
            
            if($file){
                $reto->url_imagen = $nombre[2];
            }
       }   
        $reto->titulo = $request->titulo;
        $reto->pregunta = $request->pregunta;
        $reto->necesidad = $request->necesidad;
        $reto->causa = $request->causa;
        $reto->consecuencia = $request->consecuencia;
        $reto->interesados = $request->interesados;
        $reto->tiempo_ejecucion = $request->tiempo_ejecucion;
        $reto->lugar = $request->lugar;
        $reto->condicion_e = $request->condicion_e;
        $reto->p_solucion = $request->p_solucion;
        $reto->alcance = $request->alcance;
        $reto->condicion_p = $request->condicion_p;
        $reto->accion = $request->accion;
        $reto->conocimiento = $request->conocimiento;
        $reto->elementos = $request->elementos;
        $reto->descripcion_s = $request->descripcion_s;
        $reto->evaluacion = $request->evaluacion;
        $reto->save();
        return redirect('retos/usuario');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reto  $reto
     * @return \Illuminate\Http\Response
     */
    public function destroy($reto)
    {
        $reto = reto::find($reto);
        $reto->delete();
       // $solucion = Solucion::where("id_reto","=",$reto)->select("*")->get();
       $cant = 0;
        /*if($cant==0){
            $id = md5("reto".$reto);*/
            //Storage::delete("imgreto/".$id.".jpg");
            //Reto::destroy($reto);
        return $cant;
        /*}else{
            return $cant;
        }*/
    }
    public function listretos(){
        return view("retos.list");
    }
    /**
     * Retorna la vista de retos por
     * empresa.
     * @return view
     */
    public function retosEmpresa()
    {                
        //dd($this->getRetosEmpresa(Auth::user()->instituciones->pluck('id_institucion')->first()));
        return view('usuarios.retos.retosEmpresa.index',[
            'retosEmpresa' => $this->getRetosEmpresa(Auth::user()->instituciones->pluck('id_institucion')->first())
        ]);
    }
    /**
     * Obtener los retos 
     * de los usuarios asociados a 
     * una institucion 
     * 
     * @param int id_empresa
     * @return mixed
     */
    public function getRetosEmpresa($id)
    {
        return user::with([
            'retos', 
            'instituciones' => function($query) use ($id){
                $query->select('usuario_grupo.estado')->where('usuario_grupo.id_institucion', '=', $id);
            }
            ])->whereHas('instituciones', function($query) use ($id){
                $query->where('usuario_grupo.id_institucion', '=', $id);
        })->get();
    }
    /**
     * Publicar Reto
     * @return
     */
    public function publicarReto($id)
    {
        $reto = reto::findOrFail($id);
        $reto->estado = "activo";
        $reto->save();
        return;
    }
    /**
     * Obtener retos publicados
     * @return App\Reto
     */
    public function getRetosPublicados()
    {
        return reto::where('estado', '=', 'activo')->get();
    }
}
