<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciiu_grupos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_grupo')->autoIncrement();
            $table->unsignedBigInteger('id_division');
            $table->text('descripcion');
            $table->text('codigo');            

            $table->foreign('id_division')->references('id_division')->on('ciiu_divisiones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ciiu_grupos');
    }
}
