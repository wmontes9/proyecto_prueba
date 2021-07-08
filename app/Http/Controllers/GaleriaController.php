<?php

namespace App\Http\Controllers;

use App\Galeria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GaleriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/Galeria.index');
    }
    public function getGalerias()
    {
        $galerias = Galeria::all()->toArray();
        $data = $galerias;
        return  $data;
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
        $galeria = new Galeria;
        $file = $request->url_imagen->store('public/imgGaleria');
        $nombre = explode('/',$file);
        $galeria->id_usuario = Auth::user()->id_usuario;
        $galeria->descripcion = $request->descripcion;
        $galeria->url_imagen=$nombre[2];
        $galeria->save();
        return redirect('admin/galerias');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function show(Galeria $galeria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeria $galeria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $galeria = Galeria::findOrFail($id);  
        if($request->hasFile('url_imagen')){
             Storage::delete('public/imgGaleria/'.$galeria->url_imagen);
             $file = $request->file('url_imagen')->store('public/imgGaleria');
             $nombre = explode('/',$file);
             if($file){
                 $galeria->url_imagen = $nombre[2];
             }
        }   
        $galeria->descripcion = $request->descripcion;
        $galeria->estado = $request->estado;
        $galeria->save();
        return redirect('admin/galerias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeria $galeria)
    {
        //
    }
}
