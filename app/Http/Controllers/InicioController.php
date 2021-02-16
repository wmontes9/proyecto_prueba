<?php

namespace App\Http\Controllers;
use App\AliadosEstrategicos;
use App\Reto;
use App\Evento;
use App\Sector_Economico;
use DB;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $lis_aliados = AliadosEstrategicos::all()->toArray();
        $retos = DB::table('retos')
            ->join('reto_sector_economico', 'retos.id_reto', '=', 'reto_sector_economico.id_reto')
            ->join('sector_economicos', 'reto_sector_economico.id_sector_economico', '=', 'sector_economicos.id_sector_economico')
            ->where('retos.estado', '=', 'true')
            ->select('retos.*', 'reto_sector_economico.id_sector_economico')
            ->get()->toArray();
        $eventos = Evento::where("estado","=",'true')->get()->toArray();
        $sectores = Sector_Economico::all()->toArray();
        return view('welcome',compact('lis_aliados','retos','eventos','sectores'));
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
        //
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
}
