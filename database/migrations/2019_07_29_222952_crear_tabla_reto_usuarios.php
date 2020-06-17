<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaRetoUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reto_usuarios', function (Blueprint $table) {
            $table->bigIncrements('id_reto_usuario');
            $table->unsignedBigInteger('id_reto')->index();
            $table->unsignedBigInteger('id_usuario')->index();

            $table->foreign('id_reto')->references('id_reto')->on('retos');
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
        Schema::dropIfExists('reto_usuarios');
    }
}
