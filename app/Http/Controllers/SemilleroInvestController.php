<?php

namespace App\Http\Controllers;

use App\Semillero_Invest;
use Illuminate\Http\Request;
use App;
use DB;
use Session;
class SemilleroInvestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("grupoDeInvestigacion.crearVincularSemillero.ListSemillero");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSemillero(){
        //dd("getArea");
        return Semillero_Invest::all(); //nombre clase
    }
    public function create()
    {
        dd("formulariocrearsemillero");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $semillero = new Semillero_Invest; //mirar si es el mpdelo o loa carpeta
        $semillero->id_area_conocimiento = $request->id_area_conocimiento;
        $semillero->nombre = $request->nombre;
        $semillero->sigla = $request->sigla;
        $file = $request->logo->store('public/imgSemillero');
        $nombre = explode('/',$file);
        $semillero->logo=$nombre[2];
        $semillero->save();
        
       return redirect('semilleros');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Semillero_Invest  $semillero_Invest
     * @return \Illuminate\Http\Response
     */
    public function show(Semillero_Invest $semillero_Invest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Semillero_Invest  $semillero_Invest
     * @return \Illuminate\Http\Response
     */
    public function edit(Semillero_Invest $semillero_Invest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Semillero_Invest  $semillero_Invest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semillero_Invest $semillero_Invest)
    {
        $semillero = Semillero_Invest::findOrFail($id); //mirar esto del otro
       
        if($request->hasFile('logo')){
            Storage::delete('public/imgSemillero/'.$semillero->logo);
            $file = $request->file('logo')->store('public/imgSemillero');
            //$file = $request->url_imagen_e->store('imgReto');
            $nombre = explode('/',$file);
            if($file){
                $semillero->logo = $nombre[2];
            }
       }


        $semillero->id = $request->id;
        $semillero->id_area_conocimiento = $request->id_area_conocimiento;
        $semillero->nombre = $request->nombre;
        $semillero->sigla = $request->sigla;
       
        $semillero->save();
        return redirect('semilleros');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Semillero_Invest  $semillero_Invest
     * @return \Illuminate\Http\Response
     */
    public function destroy($semillero_Invest)
    {
        $semillero = Semillero_Invest::findOrFail($semillero_Invest);
        $semillero->delete();
        $cant = 0;
        return $cant;
    }
}
