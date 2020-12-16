<?php

namespace App\Http\Controllers;

use App\Linea_Invest;
use Illuminate\Http\Request;
use App;
use Session;
class LineaInvestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("grupoDeInvestigacion.crearVincularLinea.ListLinea");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLinea(){
        //dd("getArea");
        return Linea_Invest::all(); //nombre clase
    }
    public function create()
    {
        dd("formulariocrearlinea");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $linea = new Linea_Invest; //mirar si es el mpdelo o loa carpeta
        $linea->id_grupo_invest = $request->id_grupo_invest;
        $linea->nombre = $request->nombre;
        $linea->descripcion = $request->descripcion;
        $linea->save();
        
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Linea_Invest  $linea_Invest
     * @return \Illuminate\Http\Response
     */
    public function show(Linea_Invest $linea_Invest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Linea_Invest  $linea_Invest
     * @return \Illuminate\Http\Response
     */
    public function edit(Linea_Invest $linea_Invest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Linea_Invest  $linea_Invest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Linea_Invest $linea_Invest)
    {
        $linea = Linea_Invest::find($request->id);
        $linea->id = $request->id;
        $linea->id_grupo_invest = $request->id_grupo_invest;
        $linea->nombre = $request->nombre;
        $linea->descripcion = $request->descripcion;
        $linea->save();
        return "correcto";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Linea_Invest  $linea_Invest
     * @return \Illuminate\Http\Response
     */
    public function destroy($linea_Invest)
    {
        $linea = Linea_Invest::findOrFail($linea_Invest);
        $linea->delete();
        $cant = 0;
        return $cant;
    }
}
