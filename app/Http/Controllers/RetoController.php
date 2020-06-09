<?php

namespace App\Http\Controllers;

use App\Reto;
use Illuminate\Http\Request;
use DB;
class RetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lis_retos = Reto::all()->toArray();
        //return view('retos.index')->with(['retos'=>$lis_retos]);
        return view('retos.index',compact('lis_retos'));
    }

    public function getretos(){

        $retos = Reto::all()->toArray();
        $data = $retos;
        return  response()->json($data,200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('retos.create');
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
            'Pregunta' => 'required',
        ]);*/
        Reto::create([
            "Titulo" => $request["titulo"],
            "Pregunta" => $request["pregunta"],
        ]);
        return redirect("retos/");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reto  $reto
     * @return \Illuminate\Http\Response
     */
    public function show(Reto $reto)
    {
        $reto = Reto::find($reto)->toArray();
        //return view('retos.index')->with(['retos'=>$lis_retos]);
        return view('retos.show',compact('reto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reto  $reto
     * @return \Illuminate\Http\Response
     */
    public function edit(Reto $reto)
    {
        return view('retos.update',['reto'=>$reto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reto  $reto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reto $reto)
    {
        $reto = Reto::find($reto->id);
        $reto->Titulo = $request->titulo;
        $reto->Pregunta = $request->pregunta;
        $reto->save();
        return redirect("retos/");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reto  $reto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reto $reto)
    {
        $reto = Reto::find($reto->id);
        $reto->delete();
        return redirect('retos/');
    }
}
