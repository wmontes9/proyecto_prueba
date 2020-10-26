<?php

namespace App\Http\Controllers;

use App\Sector_Economico;
use App\Reto;
use Illuminate\Http\Request;
use Session;
class SectorEconomicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.Sector_Economico.list");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSectores(){
        return Sector_Economico::all();
    }
    public function RetosSector($sector){
        Session::put("Sector",$sector);
        $datosSector = Sector_Economico::findOrFail($sector);
        return view("admin.Sector_Economico.retossector",['datosSector' => $datosSector]); 
    }
    /*public function viewRetosSector(){
       return view("admin.Sector_Economico.retossector");
    }*/
    public function SolucionesReto($reto){
        Session::put("Reto",$reto);
        $datosReto = Reto::findOrFail($reto);
        return view("admin.Sector_Economico.solucionesreto",['datosReto' => $datosReto]); 
    }
    public function getRetosSector(){
        $id_sector = Session::get("Sector");
        $sector = Sector_Economico::findOrFail($id_sector);
        return $sector->retos;
    }
    public function getSolucionesReto(){
        $id_reto = Session::get("Reto");
        $reto = Reto::findOrFail($id_reto);
        return $reto->soluciones;
    }
    public function create()
    {
        dd("formulariocrearsector");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sector = new Sector_Economico;
        $sector->nombre = $request->nombre;
        $sector->save();
        
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sector_Economico  $sector_Economico
     * @return \Illuminate\Http\Response
     */
    public function show(Sector_Economico $sector_Economico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sector_Economico  $sector_Economico
     * @return \Illuminate\Http\Response
     */
    public function edit(Sector_Economico $sector_Economico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sector_Economico  $sector_Economico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sector_Economico $sector_Economico)
    {
        $sector = Sector_Economico::find($request->id);
        $sector->id_sector_economico = $request->id;
        $sector->nombre = $request->nombre;
        $sector->save();
        return "correcto";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sector_Economico  $sector_Economico
     * @return \Illuminate\Http\Response
     */
    public function destroy($sector_Economico)
    {
        $sector = Sector_Economico::findOrFail($sector_Economico);
        $sector->delete();
       // $solucion = Solucion::where("id_reto","=",$reto)->select("*")->get();
       $cant = 0;
        /*if($cant==0){
            $id = md5("reto".$reto);*/
            //Storage::delete("imgreto/".$id.".jpg");
            //Reto::destroy($reto);
        return $cant;
    }
}
