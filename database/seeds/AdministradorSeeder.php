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
            'nombre' => 'Carmen Cecilia',
            'apellido' => 'Zuluaga Arenas',
            'id_identificacion' => 1,
            'num_identificacion' => '4901239210',
            'direccion' => 'SENA CEGAFE',
            'telefono' => '3155448187',
            'nombre_usuario' => 'cczuluaga',
            'email' => 'cczuluagaa@sena.edu.co',
            'password' =>  Hash::make('Carmen4901239210'),
        ]);
        $user->roles()->sync(6);
    }
}
