<?php

use Illuminate\Database\Seeder;
use App\TipoIdentificacion;
use App\Rol;
use App\Modulo;
use App\Permiso;
use App\Grupo;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    protected $identification_types = [
        'CC' => 'Cedula de Ciudadania',
        'TI' => 'Tarjeta de Identidad',
        'CE' => 'Cedula de Extranjeria'
    ];

    protected $roles = [
        'Empresa',
        'Grupo de Investigacion',
        'Centro de Emprendimiento',
        'Instituto de Investigacion',
        'Persona Natural', 
        'Administrador',       
    ];
    protected $modulos = [
        'retos','soluciones','usuarios','instituciones'
    ];
    protected $permisos = [
        'crear', 'leer', 'actualizar', 'eliminar'
    ];
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->identification_types as $shortcut => $text){
            $create_identification_type = new TipoIdentificacion;
            $create_identification_type->abreviatura = $shortcut;
            $create_identification_type->nombre = $text;
            $create_identification_type->save();
        }
        foreach ($this->roles as $rol) {
            $modeloRol = new Rol;
            $modeloRol->nombre = $rol;
            $modeloRol->save();
        }
        foreach ($this->modulos as $nombre) {
            $modulo = new Modulo;
            $modulo->nombre = $nombre;
            $modulo->save();
            foreach ($this->permisos as $p) {
                $permiso = new Permiso;
                $permiso->id_modulo = $modulo->id_modulo;
                $permiso->clave = $p.'_'.$modulo->nombre;
                $permiso->descripcion = 'puede '.$p.' en '.$modulo->nombre;
                $permiso->save();
            }
        }
        foreach($this->roles as $g){
            $grupo = new Grupo;
            $grupo->nombre = $g;
            $grupo->save();
        }
        /**
         * Codigo ciiu
         */
        $data_ciiu = Storage::get('CIIU.json');

        $ciiu = json_decode($data_ciiu, true);

        foreach($ciiu as $codigo_seccion => $def_seccion){
            $id_seccion = DB::table('ciiu_secciones')->insertGetId(
                [
                    'descripcion' => $def_seccion['titulo'],
                    'codigo' => $codigo_seccion
                ]
            );            
            foreach($def_seccion['divisiones'] as $cod_div => $def_div){
                $id_division = DB::table('ciiu_divisiones')->insertGetId(
                    [
                        'id_seccion' => $id_seccion,
                        'descripcion' => $def_div['titulo'],
                        'codigo' => $cod_div
                    ]
                );                
                foreach ($def_div['grupos'] as $cod_grupo => $def_grupo) {
                    $id_grupo = DB::table('ciiu_grupos')->insertGetId(
                        [
                            'id_division' => $id_division,
                            'descripcion' => $def_grupo['titulo'],
                            'codigo' => $cod_grupo
                        ]
                    );                    
                    foreach ($def_grupo['actividades'] as $cod_clase => $def_clase) {
                        DB::table('ciiu_clases')->insertGetId(
                            [
                                'id_grupo' => $id_grupo,
                                'descripcion' => $def_clase,
                                'codigo' => $cod_clase
                            ]
                        );                        
                    }
                }

            }
        }
        $this->call([
            AdministradorSeeder::class
        ]);
    }    
}
