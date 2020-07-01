<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciiu_divisiones', function (Blueprint $table) {
            $table->unsignedBigInteger('id_division')->autoIncrement();
            $table->unsignedBigInteger('id_seccion');
            $table->text('descripcion');
            $table->text('codigo');            

            $table->foreign('id_seccion')->references('id_seccion')->on('ciiu_secciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('divisions');
    }
}
