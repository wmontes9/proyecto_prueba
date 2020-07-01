<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaUsuarioGrupo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('usuario_grupo', function (Blueprint $table) {
            $table->bigIncrements('id_usuario_grupo');            
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_grupo');
            /*$table->string('rol')->default('asociado');
            $table->integer('estado')->default(0);*/

            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
            $table->foreign('id_grupo')->references('id_grupo')->on('grupos');

            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_grupo');
    }
}
