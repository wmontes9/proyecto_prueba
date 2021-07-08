<?php

namespace App\Http\Controllers;
use Session;
use App\Institucion;
use App\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
      /**
     * Esta propiedad define la vista 
     * principal de cada rol con base en el usuario
     * autenticado
     */
    private $rutasPorRol = [
        'Empresa' => '/vistaRol/empresa',
        'Grupo de Investigacion' => '/vistaRol/grupoInvestigacion',
        'Centro de Emprendimiento' => '/vistaRol/centroEmprendimiento',
        'Instituto de Investigacion' => '/vistaRol/institutoInvestigacion',
        'Persona Natural' => '/vistaRol/personaNatural',
        'Administrador' => '/home'
    ];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        /**        
         * Muestra la vista con base al rol seleccionado
         */        
        $rolActual = $request->session()->get('rolActual');        
        if( $rolActual !== null ){
            $rol = Grupo::find($rolActual);      
            foreach ($this->rutasPorRol as $nombre => $ruta) {
                if ($rol->nombre === $nombre) { 
                    $request->session()->put('rolNombre', $rol->nombre);                                        
                    $request->session()
                        ->put('contenido_nav','layouts.contenidoNav.'. trim(strtolower($nombre)));
                        //dd($ruta,['dts_institucion' => $this->verificarDatosInstitucion()]);
                        return view($ruta,[
                        'dts_institucion' => $this->verificarDatosInstitucion()                     
                    ]);                    
                }
            }
        }else{
            return view('/home');
        }     
        //return view('home');
    }
    public function admin()
    {
        return view('home');
    }
    /**
     * Obtener los datos de la insitucion
     * asociada al usuario
     */
    public function verificarDatosInstitucion()
    {
        return Institucion::whereHas('usuarios',function($query){
            $query->where('usuarios.id_usuario','=',Auth::user()->id_usuario);
        })->first();
    }
}
