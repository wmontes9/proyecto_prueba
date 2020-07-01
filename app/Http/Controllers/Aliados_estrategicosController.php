<?php

namespace App\Http\Controllers;

use DB; 
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;

use App\AliadosEstrategicos;


class Aliados_estrategicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $lis_aliados = AliadosEsrtrategicos::all()->toArray();
        return view('welcome',compact('lis_aliados')); */

        return view('aliados_estrategicos.index',[
            'lis_aliados' => AliadosEstrategicos::all()->toArray()
        ]);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aliados_estrategicos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);
        }

        $lis_aliados = new AliadosEstrategicos();
        $lis_aliados->nombre = $request->input('nombre');
        $lis_aliados->descripcion = $request->input('descripcion');
        $lis_aliados->logo = $name;
        $lis_aliados->url = $request->input('url');
        $lis_aliados->save();
        
        return redirect()->route('aliados_estrategicos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AliadosEstrategicos  $lis_aliados)
    { 
        return view('aliados_estrategicos.show',[
            'lis_aliados' => $lis_aliados
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AliadosEstrategicos  $lis_aliados)
    {
        return view('aliados_estrategicos.edit',[
            'lis_aliados' => $lis_aliados
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AliadosEstrategicos  $lis_aliados)
    {
        $lis_aliados->fill($request->except('logo'));
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $name = time().$file->getClientOriginalName();
            $lis_aliados->logo = $name;
            $file->move(public_path().'/images/',$name);
        }
        $lis_aliados->save();

        return redirect()->route('aliados_estrategicos.index', $lis_aliados);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( AliadosEstrategicos  $lis_aliados)
    {
        $lis_aliados->delete();
        return redirect()->route('aliados_estrategicos.index');
    }

    public function formulario()
    {
        return view('buscar.fechas');
    }

    public function buscar(Request $request )
    {
        //dd($request->input('fecha_inicial'));
        $fec_ini = $request->input("fecha_inicial");
        $fec_fin = $request->input("fecha_final");

        $results = AliadosEstrategicos::whereBetween('created_at', [ $fec_ini , $fec_fin ])->get();       

        return view('buscar.fechas', compact('results'));
        

    }

    
}
