<?php
namespace App\Http\Controllers;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Reto;
use App\Solucion;
use Session;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SolucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin/Solucion.index");
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSoluciones(){
        $solucion = DB::table("soluciones")->select("*")->get()->toArray();
        $data = $solucion;
        return  response()->json($data,200);
    }
    public function getinfo(){
        return view("Solucion.index"); 
    }
    public function getgeneralusuario($reto){
        Session::put("reto",$reto);
        return;
        /*$solucion = DB::table("soluciones")
        ->where('soluciones.estado', '=', 'activo') 
        ->where('soluciones.id_reto','=',$reto)
        ->select("*")
        ->get()->toArray();
        $data = $solucion;
        return  response()->json($data,200);*/
    }
    public function getgeneralreto()
    {
        $reto = Session::get("reto");
        $solucion = DB::table("soluciones")
        ->where('soluciones.estado', '=', 'activo') 
        ->where('soluciones.id_reto','=',$reto)
        ->select("*")
        ->get()->toArray();
        $data = $solucion;
        return  response()->json($data,200);
        /*->where('soluciones.estado', '=', 'activo') 
        ->where('soluciones.id_reto','=',$reto)*/
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
        $solucion = new Solucion;
        $solucionid = Solucion::all()->last();
        $file = $request->image_solucions->store('public/imgSolucion');
        //$file = $request->file("url_imagen");
        $nombre = explode('/',$file);
        $solucion->id_reto = $request->id_reto;
        $solucion->titulo = $request->titulo;
        $solucion->justificacion = $request->justificacion;
        $solucion->planteamiento = $request->planteamiento;
        $solucion->referencias = $request->referencias;
        $solucion->image_solucion=$nombre[2];
        $solucion->estado="inactivo";
        $solucion->save();
        
        return redirect('admin/solucion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Session::put("reto",$id);
        return;
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
        $solucion = Solucion::findOrFail($id);
        // dd(Str::after($file,'/'));
        if($request->hasFile('image_solucion')){
             Storage::delete('public/imgSolucion/'.$solucion->image_solucion);
             $file = $request->file('image_solucion')->store('public/imgSolucion');
             $nombre = explode('/',$file);
             if($file){
                 $solucion->image_solucion = $nombre[2];
             }
         }
         //$file = $request->url_imagen_e->store('imgReto');
         
         $solucion->id_reto = $request->id_reto;
         $solucion->titulo = $request->titulo;
         $solucion->justificacion = $request->justificacion;
         $solucion->planteamiento = $request->planteamiento;
         $solucion->referencias = $request->referencias;
         $solucion->estado="inactivo";
         $solucion->save();
        
        return redirect('admin/solucion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($solucion)
    {
        $solucion = Solucion::find($solucion);
        $solucion->delete();
        // $solucion = Solucion::where("id_reto","=",$reto)->select("*")->get();
        $cant = 0;
        /*if($cant==0){
            $id = md5("reto".$reto);*/
            //Storage::delete("imgreto/".$id.".jpg");
            //Reto::destroy($reto);
        return $cant;
        /*}else{
            return $cant;
        }*/
    }
}
