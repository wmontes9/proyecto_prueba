<?php

namespace App\Http\Controllers;
use App\AliadosEstrategicos;
use App\Reto;
use App\Evento;
use App\Comentario;
use App\Sector_Economico;
use App\Galeria;
use App\User;
use DB;
use PDF;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public $page = '';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       //America/Bogota
       date_default_timezone_set('America/Bogota');
       if(!empty($_REQUEST['page'])){
            $this->page = $_REQUEST['page'];
       }

    }
    public function index(){
        if($this->page!=''){
            if($this->page=='retos'){
                $reto = Reto::findOrFail($_REQUEST['id']);
                return view('usuarios.retos.retosprincipal.index',compact('reto'));
            }else if($this->page=='generar_pdf'){
                $reto = Reto::findOrFail($_REQUEST['id']);
                $pdf = PDF::loadView('usuarios.retos.retosprincipal.pdf.reto',compact('reto'));  
                return $pdf->download('reto.pdf'); 
            }

        }
        $lis_aliados = AliadosEstrategicos::all()->toArray();
        $retos = DB::table('retos')
        ->join('reto_sector_economico', 'retos.id_reto', '=', 'reto_sector_economico.id_reto')
        ->join('sector_economicos', 'reto_sector_economico.id_sector_economico', '=', 'sector_economicos.id_sector_economico')
        ->where('retos.estado', '=', 'true')
        ->select('retos.*', 'reto_sector_economico.id_sector_economico')
        ->get()->toArray();
        $eventos = Evento::where("estado","=",'true')->get()->toArray();
        $sectores = Sector_Economico::all()->toArray();
        $comentarios = Comentario::with("usuarios")->where("estado","=",'true')->get()->toArray();
        //dd($comentarios[0]['usuarios']['url_imagen']);
        $galerias = Galeria::where("estado","=",'true')->get()->toArray();
        $mentores = User::where("mentor","=",'true')->where("activo","=",1)->get()->toArray();
        return view('welcome',compact('lis_aliados','retos','eventos','sectores','comentarios','galerias','mentores'));
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
