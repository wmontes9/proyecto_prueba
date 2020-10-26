<?php

use App\User;
use Illuminate\Database\Seeder;

class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'id_municipio' => 3,
            'nombre' => 'Carmen Cecilia',
            'apellido' => 'Zuluaga Arenas',
            'tipo_documento' => 'CC',
            'num_identificacion' => '4901239210',
            'direccion' => 'SENA CEGAFE',
            'telefono' => '3155448187',
            'email' => 'cczuluagaa@sena.edu.co',
            'password' =>  Hash::make('Carmen4901239210'),
            'administrador' => True,
            'staf' => True,
            'activo' => True,
        ]);
        $user->grupos()->sync(6);
    }
}
