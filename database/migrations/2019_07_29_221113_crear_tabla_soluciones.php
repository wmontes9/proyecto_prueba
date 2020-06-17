<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSoluciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soluciones', function (Blueprint $table) {
            $table->unsignedBigInteger('id_solucion')->autoIncrement();
            $table->unsignedBigInteger('id_reto');
            $table->text('titulo');
            $table->longText('justificacion');
            $table->longText('planteamiento');
            $table->text('image_solucion')->nullable();
            $table->longText('referencias');
            $table->string('estado');
            $table->timestamps();

            $table->foreign('id_reto')->references('id_reto')->on('retos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soluciones');
    }
}
