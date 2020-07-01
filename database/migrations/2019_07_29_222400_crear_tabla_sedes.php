<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSedes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('sedes', function (Blueprint $table) {
            $table->bigIncrements('id_sede');            
            $table->unsignedBigInteger('id_institucion')->index();
            $table->unsignedBigInteger('id_municipio')->index();
            $table->longText('direccion');
            $table->text('telefono');

            $table->foreign('id_institucion')->references('id_institucion')->on('instituciones');
            $table->foreign('id_municipio')->references('id_municipio')->on('municipios');

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
        Schema::dropIfExists('sedes');
    }
}
