<?php

namespace App\Http\Controllers;

use App\Publicidad;
use Illuminate\Http\Request;
use DB;

class PublicidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lis_publicidad = Publicidad::all()->toArray();
        //return view('publicidad.index')->with(['publicidad'=>$lis_publicidad]);
        return view('publicidad.index',compact('lis_publicidad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publicidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          /* $fields = request()->validate([  //para validar información
            'Titulo' => 'required',
            'Contenido' => 'required',
        ]);*/
        Publicidad::create([
            "Titulo" => $request["titulo"],
            "Contenido" => $request["contenido"],
        ]);
        return redirect("publicidad/");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Publicidad  $publicidad
     * @return \Illuminate\Http\Response
     */
    public function show(Publicidad $publicidad)
    {
        $publicidad = Publicidad::find($publicidad)->toArray();
        //return view('publicidad.index')->with(['publicidad'=>$lis_publicidad]);
        return view('publicidad.show', compact('publicidad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Publicidad  $publicidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Publicidad $publicidad)
    {
        return view('publicidad.update', ['publicidad' => $publicidad]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Publicidad  $publicidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publicidad $publicidad)
    {
        $publicidad = Publicidad::find($publicidad->id);
        $publicidad->Titulo = $request->titulo;
        $publicidad->Contenido = $request->contenido;
        $publicidad->save();
        return redirect("publicidad/");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Publicidad  $publicidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publicidad $publicidad)
    {
        $publicidad = Publicidad::find($publicidad->id);
        $publicidad->delete();
        return redirect('publicidad/');
    }
}
