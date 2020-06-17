<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaActividadEconomica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {               
        Schema::create('acti_economica', function (Blueprint $table) {
            $table->bigIncrements('id_acti_economica');
            $table->unsignedBigInteger('id_institucion');
            $table->unsignedBigInteger('id_clase');
            $table->string('codigo');
            $table->string('tipo');
            $table->timestamps();

            $table->foreign('id_institucion')->references('id_institucion')->on('instituciones');
            $table->foreign('id_clase')->references('id_clase')->on('ciiu_clases');
        });          
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividad_economica');
    }
}
