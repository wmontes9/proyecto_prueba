<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentario;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function __construct(){
		date_default_timezone_set('America/Bogota');
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/Comentario.index');
    }
    public function getComentarios()
    {
        $rolActual = Session::get('rolActual');
        if($rolActual == 6){
            $comentarios = Comentario::all()->toArray();
            $data = $comentarios;
        }elseif($rolActual == 1){
            $comentarios = DB::table('comentarios')
            ->join('usuarios', 'usuarios.id_usuario', '=', 'comentarios.id_usuario')
            ->join('usuario_grupo', 'usuario_grupo.id_usuario', '=', 'usuarios.id_usuario')
            ->where('usuario_grupo.id_grupo', '=', 1)
            ->select('comentarios.*', 'usuario_grupo.id_grupo')
            ->get()->toArray();
            $data = $comentarios;
        }
        
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
        
        $comentario = new Comentario;
        $comentario->id_usuario = Auth::user()->id_usuario;
        $comentario->descripcion = $request->descripcion;
        $comentario->save();
        return redirect('admin/comentarios');
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
        $comentario = Comentario::findOrFail($id);
        $comentario->descripcion = $request->descripcion;
        $rolActual = Session::get('rolActual');
        if($rolActual == 6){
            $comentario->estado = $request->estado;
        }
        $comentario->save();
        
        return redirect('admin/comentarios');
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
    public function destroyer($comentario)
    {
        $coment = Comentario::findOrFail($comentario);  
        $coment->estado = 'false';
        $coment->save();
        return;
    }
}
