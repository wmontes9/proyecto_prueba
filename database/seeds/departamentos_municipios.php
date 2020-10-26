<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class departamentos_municipios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = Storage::get('colombia.json');
        $datos_array = json_decode($data, true);
        foreach($datos_array as $departamentos => $departamento){
            $id_departamento = DB::table('departamentos')->insertGetId(
                [
                    'nombre' => $departamento['departamento']
                ]
            );
            foreach($departamento['ciudades'] as $municipios => $ciudades){
                $id_municipio = DB::table('municipios')->insertGetId(
                    [
                        'id_depto' => $id_departamento,
                        'nombre' => $ciudades   
                    ]
                );   
            }     
        }
    }     
}