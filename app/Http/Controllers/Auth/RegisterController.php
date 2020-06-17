<?php

namespace App\Http\Controllers\Auth;

use App\Grupo;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\TipoIdentificacion;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string'],
            'document_type' => ['required','integer'],
            'number_doc' => ['required','string'],
            'address' => ['required','string'],
            'phone' => ['required'],
            'nombre_usuario' => ['required','unique:usuarios'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'rol' => ['required','integer'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //$usere = User::findOrFail($data['number_doc']);
        $usere = User::where("num_identificacion","=",$data['number_doc'])->select("*")->get()->toArray();//Consultar si existe algun usuario con este número de identidad
        $role = Grupo::where("id_grupo","=",$data['rol'])->select("*")->get()->toArray();
        //$user = User::find($data['number_doc']);
        //Auth::user()->Grupo_Invest->toJson();
        $cant = count($usere);
        if($cant==0){ //Si no existe para a crear uno nuevo
            $user = User::create([
                'nombre' => $data['name'],
                'apellido' => $data['lastname'],
                'id_identificacion' => $data['document_type'],
                'num_identificacion' => $data['number_doc'],
                'direccion' => $data['address'],
                'telefono' => $data['phone'],
                'nombre_usuario' => $data['nombre_usuario'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        }else{
            $user = User:: find($usere[0]['id_usuario']);
            foreach ($role as $rol) {
                if($rol['id_grupo'] == $data['rol']){
                    dd($rol['nombre']);
                }
            }
        }
        $rol = $data['rol'];
        $user->roles()->attach($rol);
        $user->grupos()->attach(Grupo::findOrFail($data['rol']));
        return $user;
    }
    protected function getTiposIdentificacion(){
        return TipoIdentificacion::all();
    }    
}
