<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaRetos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retos', function (Blueprint $table) {
            $table->bigIncrements('id_reto');
            $table->text('titulo');
            $table->longText('pregunta');
            $table->longText('necesidad');
            $table->longText('causa');
            $table->longText('consecuencia');
            $table->longText('interesados');
            $table->longText('tiempo_ejecucion');
            $table->longText('lugar');
            $table->longText('condicion_e');
            $table->longText('p_solucion');
            $table->longText('alcance');
            $table->longText('condicion_p');
            $table->longText('accion');
            $table->longText('conocimiento');
            $table->longText('elementos');
            $table->longText('descripcion_s');
            $table->longText('evaluacion');
            $table->text('url_imagen');
            $table->string('estado');
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
        Schema::dropIfExists('retos');
    }
}
