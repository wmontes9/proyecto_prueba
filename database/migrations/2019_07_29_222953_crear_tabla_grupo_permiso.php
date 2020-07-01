<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaGrupoPermiso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {               
        Schema::create('grupo_permiso', function (Blueprint $table) {
            $table->bigIncrements('id_grupo_permiso');
            $table->unsignedBigInteger('id_grupo');
            $table->unsignedBigInteger('id_permiso');           
            
            $table->timestamps();
            
            $table->foreign('id_grupo')->references('id_grupo')->on('grupos');
            $table->foreign('id_permiso')->references('id_permiso')->on('permisos');          
        });            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupo_permiso');
    }
}
