<?php

namespace App\Http\Controllers;

use App\Sub_Linea_Invest;
use App\Semillero_Invest;
use Illuminate\Http\Request;
use App;
use Session;
class SubLineaInvestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("grupoDeInvestigacion.crearVincularSubLinea.ListSubLinea");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSubLinea(){
        //dd("getArea");
        return Sub_Linea_Invest::all(); //nombre clase
    }

    public function SubLineaSemilleros($sublinea){
        Session::put("SubLinea",$sublinea);
        $datosSubLinea = Sub_Linea_Invest::findOrFail($sublinea);
        return view("grupoDeInvestigacion.crearvincularSubLinea.SubLineaSemilleros",['datosSubLinea' => $datosSubLinea]); 
    }
   
    
 
    public function getSubLineaSemilleros(){
        $id= Session::get("SubLinea");
        $sublinea = Sub_Linea_Invest::findOrFail($id); //mirar el id y mirar nombres si funcionan
        return $sublinea->sublineasemillero; ///mirar este return
    }
   
  
    public function create()
    {
        dd("formulariocrearsublinea");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sublinea = new Sub_Linea_Invest; //mirar si es el mpdelo o loa carpeta
        $sublinea->id_linea_invest = $request->id_linea_invest;
        $sublinea->nombre = $request->nombre;
        $sublinea->descripcion = $request->descripcion;
        $sublinea->save();
        
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sub_Linea_Invest  $sub_Linea_Invest
     * @return \Illuminate\Http\Response
     */
    public function show(Sub_Linea_Invest $sub_Linea_Invest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sub_Linea_Invest  $sub_Linea_Invest
     * @return \Illuminate\Http\Response
     */
    public function edit(Sub_Linea_Invest $sub_Linea_Invest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sub_Linea_Invest  $sub_Linea_Invest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sub_Linea_Invest $sub_Linea_Invest)
    {
        $sublinea = Sub_Linea_Invest::find($request->id);
        $sublinea->id = $request->id;
        $sublinea->id_linea_invest = $request->id_linea_invest;
        $sublinea->nombre = $request->nombre;
        $sublinea->descripcion = $request->descripcion;
        $sublinea->save();
        return "correcto";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sub_Linea_Invest  $sub_Linea_Invest
     * @return \Illuminate\Http\Response
     */
    public function destroy($Sub_Linea_Invest)
    {
        $sublinea = Sub_Linea_Invest::findOrFail($Sub_Linea_Invest);
        $sublinea->delete();
        $cant = 0;
        return $cant;
    }
}
