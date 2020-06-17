<?php

namespace App\Http\Controllers;

use App\ActividadEconomica;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Institucion;
use App\Rol;
use App\User;
use Illuminate\Support\Facades\Auth;
use Psy\Util\Json;

class InstitucionController extends Controller
{ 
      
    public function listarInstitucion(){
        $instituciones = Institucion::all();
        return $instituciones;
    }

    public function crearInstitucion(Request $request)
    {        
        $validator = $this->validarDatos($request);
        if(!$validator->fails()){                        
            $institucion = new Institucion;
            $institucion->razon_Social = $request->razon;
            $institucion->nit = $request->nit;
            $institucion->tiempo_constitucion = $request->tiempo;
            $institucion->email = $request->email;
            $institucion->telefono = $request->telefono;
            $institucion->direccion = $request->direccion;
            $institucion->num_Empleados = $request->numero_empleados;
            $institucion->save();

            $this->agregarActividades($institucion->id_institucion, $request->all());
            
            $usuario_grupo = Auth::user()->grupos;
            foreach ($usuario_grupo as $grupo) {
                if($grupo->pivot->id_grupo === $request->session()->get('rolActual')){
                    $grupo->pivot->id_institucion = $institucion->id_institucion;
                    $grupo->pivot->rol = "lider";
                    $grupo->pivot->estado = 1;
                    $grupo->pivot->save();
                }
            }
            return redirect()->route('home');
        }else{
            return redirect('instituciones/')
                    ->withErrors($validator)
                    ->withInput();
        }
    }
    public function agregarActividades($id_institucion, $requestData)
    {
        $institucion = Institucion::findOrFail($id_institucion);
        foreach ( $requestData['codigos'] as $codigo ) {
            $tipo = 'secundaria';
            $actividad = explode('/',$codigo);
            if($actividad[1] === $requestData['primaria']){
                $tipo = 'primaria';
            }
            $institucion->actividades()->attach($actividad[1],[
                'codigo' => $actividad[0],
                'tipo' => $tipo
            ]);            
        }
    }

    public function actualizarDatosInstitucion(Request $request, $id)
    {                   
            $institucion = Institucion::findOrFail($id);        
            $institucion->razon_social = $request->razon_social;
            $institucion->nit = $request->nit;
            $institucion->tiempo_Constitucion = $request->tiempo_constitucion;
            $institucion->email = $request->email;
            $institucion->telefono = $request->telefono;
            $institucion->direccion = $request->direccion;
            $institucion->num_Empleados = $request->num_empleados;
            $institucion->save(); 
            return response('success', 200);                 
    }

    public function destroy($id)
    {
        $institu = Institucion::findOrFail($id);                
        $institu->delete(); 
        return response('success', 200); 
    }
    public function buscarInstitucion($nit){        
        return Institucion::where('nit','=',$nit)->get();
    }
    public function consultarCIIU($texto, $filtro)
    {
        if($filtro === "codigo"){
            $restricciones = [
                'clase' => preg_replace('/[^0-9]+/','',$texto),
                'seccion' => preg_replace('/[0-9]+/','',$texto)
            ];            
            return  DB::table('ciiu_secciones')
                    ->join('ciiu_divisiones','ciiu_secciones.id_seccion','ciiu_divisiones.id_seccion')
                    ->join('ciiu_grupos','ciiu_divisiones.id_division','ciiu_grupos.id_division')
                    ->join('ciiu_clases','ciiu_grupos.id_grupo','ciiu_clases.id_grupo')
                    ->select('ciiu_clases.*','ciiu_secciones.codigo as seccion')
                    ->where([
                        'ciiu_clases.codigo'=> $restricciones['clase'],
                        'ciiu_secciones.codigo' => $restricciones['seccion']
                        ])
                    ->get()->toArray();
        }else{
            $res =  DB::table('ciiu_secciones')
                    ->join('ciiu_divisiones','ciiu_secciones.id_seccion','ciiu_divisiones.id_seccion')
                    ->join('ciiu_grupos','ciiu_divisiones.id_division','ciiu_grupos.id_division')
                    ->join('ciiu_clases','ciiu_grupos.id_grupo','ciiu_clases.id_grupo')
                    ->select('ciiu_clases.*','ciiu_secciones.codigo as seccion')
                    ->where('ciiu_clases.descripcion','like', "%$texto%")
                    ->get()->toArray();  
            return $res;                  
        }
    }    
    public function validarDatos($requestToValidate)
    {
        return Validator::make($requestToValidate->all(),[
            'razon' => 'required|string|unique:instituciones,razon_social',
            'nit' => 'required|string|unique:instituciones,nit',
            'tiempo' => 'required|string',
            'numero_empleados' => 'required|numeric',
            'primaria' => 'required|string',
            'codigos' => 'required|array|max:4',
            'codigos.*' => 'required|string',
            'email' => 'required|email',
            'telefono' => 'required|integer',
            'direccion' => 'required|string'
        ]);
    }
    public function datosInstitucion(Request $request)
    {                
        return Institucion::with('grupos')->whereHas('grupos',function($query) use($request){
                $query->where('grupos.id_grupo', '=', Rol::find($request->session()->get('rolActual'))->id_rol);
            })->whereHas('usuarios',function($query){
                $query->where('usuarios.id_usuario','=',Auth::user()->id_usuario);
            })            
            ->get()
            ->toArray();
    }
    public function actualizarActividades(Request $request)
    {
        $actividades = Institucion::findOrFail($request->institucion)->actividades;         
        if( count($actividades) > 0){
            foreach ($request->codigos as $codigo) {                
                if(!$this->verificarActividadesRegistradas(explode('/',$codigo), $actividades, $request->primaria)){
                    $datos = [
                        "codigos" => [$codigo],
                        "primaria" => $request->primaria,
                    ];
                    $this->agregarActividades($request->institucion, $datos);
                }else{
                    continue;
                }
            }            
        }else{
            $this->agregarActividades($request->institucion, $request->all());
        }
        return redirect()->route('home');
    }
    public function quitarActividad(Request $request)
    {        
        $insVerificada = $this->verificarInstitucionRolAutenticado($request->id_institucion);
        if($insVerificada){
            $insVerificada->actividades()->detach($request->id_clase);            
        }
        return;        
    }
    public function verificarInstitucionRolAutenticado($id)
    {
        foreach (Auth::user()->instituciones as $institucion) {
            return ($institucion->id_institucion == $id)? $institucion : false;
        }
    }
    public function verificarActividadesRegistradas(array $defCodigo, $actividades, $codigoActPrimaria)
    {
        foreach ($actividades as $actividad) {
            if($actividad->pivot->codigo == $defCodigo[0]){
                $this->actualizarActividadPrimaria($actividad, $codigoActPrimaria);
                return true;
            }            
        }
        return false;
    }
    public function actualizarActividadPrimaria($actividadActual, $primaria)
    {
        if($actividadActual->pivot->id_clase == $primaria){
            $actividadActual->pivot->tipo = "primaria";
            $actividadActual->pivot->save();
            return;
        }
        $actividadActual->pivot->tipo = "secundaria";
        $actividadActual->pivot->save();
        return;
    }
    public function vincularInstitucion(Request $request)
    {
        $id_empresa = $request->input('id_empresa');
        $usuario_grupo = Auth::user()->grupos;
        foreach ($usuario_grupo as $grupo) {
            if($grupo->pivot->id_grupo === $request->session()->get('rolActual')){                                
                $grupo->pivot->id_institucion = $id_empresa;
                $grupo->pivot->save();
            }
        }
       return redirect()->back();
    } 
    //Administracion de Usuarios    
    public function usuariosAsociados($id)
    {        
        if (Auth::user()->instituciones->pluck('id_institucion')->contains($id)) {
            return [
                "asociados" => $this->consultarUsuariosInstitucion($id,1),
                "solicitudes" => $this->consultarUsuariosInstitucion($id,0),
                "inhabilitados" => $this->consultarUsuariosInstitucion($id,2)
            ];
        } else {
            return [
                false,
                "Contenido No Valido"
            ];            
        }
    }    
    public function consultarUsuariosInstitucion($id, $estado)
    {
        return User::with('instituciones')->whereHas('instituciones', function($query) use($id, $estado){
            $query->where([
                    ['usuario_grupo.id_institucion','=',$id],
                    ['usuario_grupo.id_usuario','<>',Auth::user()->id_usuario],
                    ['usuario_grupo.estado', '=', $estado]
                ]);
        })->get()->toArray();
    }
    public function activarSolicitud(Request $request, $id)
    {
        $institucion = Institucion::with([
            'usuarios' => function($query) use($id){
                $query->where('usuario_grupo.id_usuario', '=', $id)->first();
            }
        ])->first();          
        if( $institucion ){
           foreach ($institucion->usuarios as $usuario) {
                $usuario->pivot->estado = $request->switch_estado;
                $usuario->pivot->save();
           }
        }
        return redirect()->back();
    }
    public function vistaUsuariosAsociados($id)
    {
        //dd($this->usuariosAsociados($id));
        return view('institucion.datosInstitucion.listaAsociados.index',[            
            'id_institucion' => $id
        ]);
    }
}
