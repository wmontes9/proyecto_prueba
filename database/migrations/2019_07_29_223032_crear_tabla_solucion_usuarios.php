<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSolucionUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solucion_usuarios', function (Blueprint $table) {
            $table->bigIncrements('id_solucion_usuario');
            $table->unsignedBigInteger('id_solucion');
            $table->unsignedBigInteger('id_usuario');

            $table->foreign('id_solucion')->references('id_solucion')->on('soluciones');
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
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
        Schema::dropIfExists('solucion_usuarios');
    }
}
