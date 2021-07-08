<?php

namespace App\Http\Controllers;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Departamento;
use App\Municipio;
use App\Grupo;
use App\User;
use Session;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('usuarios.usuario.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        if($request->hasFile('url_imagen_e')){
             Storage::delete('public/imgUsuario/'.$usuario->url_imagen);
             $file = $request->file('url_imagen_e')->store('public/imgUsuario');
             $nombre = explode('/',$file);
             if($file){
                 $usuario->url_imagen = $nombre[2];
             }
         }
         if($request->municipio){
            $usuario->id_municipio = $request->municipio; 
         }
         $usuario->nombre = $request->name;
         $usuario->apellido = $request->lastname;
         $usuario->direccion = $request->address;
         $usuario->telefono = $request->phone;
         $usuario->email = $request->email;
         $usuario->save();
        
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function actualizardatos()
    {
        $user = Auth::user()->toArray();
        return $user;
    }
    public function categorias()
    {
        return Grupo::all();
    }
    public function departamentos(){
        return Departamento::all();
    } 
    public function municipios($id_departamento){
        return Municipio::where('id_depto', '=', $id_departamento)->get();
    }
}
