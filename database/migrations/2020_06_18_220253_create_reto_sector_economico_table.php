<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetoSectorEconomicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reto_sector_economico', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_reto')->index();
            $table->unsignedBigInteger('id_sector_economico')->index();            
            $table->timestamps();

            $table->foreign('id_reto')->references('id_reto')->on('retos');
            $table->foreign('id_sector_economico')->references('id_sector_economico')->on('sector_economicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reto_sector_economico');
    }
}
