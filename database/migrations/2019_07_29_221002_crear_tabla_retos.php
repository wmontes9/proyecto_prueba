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
            $table->longText('causas');
            $table->longText('consecuencias');
            $table->longText('interesados');
            $table->longText('region');
            $table->longText('ubicacion');
            $table->longText('condicion_e');
            $table->longText('tiempo_e');
            $table->longText('p_solucion');
            $table->longText('alcance');
            $table->longText('condicion_fp');
            $table->longText('acciones_c');
            $table->longText('recursos_e');
            $table->longText('elementos_ps');
            $table->longText('evaluacion')->nullable();
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
