<?php

namespace App\Http\Controllers;

use App\Area_Conocimiento;
use Illuminate\Http\Request;
use App;
use Session;
class AreaConocimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("grupoDeInvestigacion.crearVincularArea.ListArea");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getArea(){
        //dd("getArea");
        return area_conocimiento::all(); //nombre clase
    }
    public function create()
    {
        dd("formulariocreararea");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $area = new Area_Conocimiento; //mirar si es el mpdelo o loa carpeta
        $area->nombre = $request->nombre;
        $area->save();
        
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Area_Conocimiento  $area_Conocimiento
     * @return \Illuminate\Http\Response
     */
    public function show(Area_Conocimiento $area_Conocimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Area_Conocimiento  $area_Conocimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Area_Conocimiento $area_Conocimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Area_Conocimiento  $area_Conocimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area_Conocimiento $area_Conocimiento)
    {
        $area = Area_Conocimiento::find($request->id);
        $area->id_area_conocimiento = $request->id;
        $area->nombre = $request->nombre;
        $area->save();
        return "correcto";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Area_Conocimiento  $area_Conocimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy( $area_Conocimiento)
    {
        $area = Area_Conocimiento::findOrFail($area_Conocimiento);
        $area->delete();
        $cant = 0;
        return $cant;
    }
}
