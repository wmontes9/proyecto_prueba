<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciiu_clases', function (Blueprint $table) {
            $table->bigIncrements('id_clase');
            $table->unsignedBigInteger('id_grupo');
            $table->text('descripcion');
            $table->text('codigo');           

            $table->foreign('id_grupo')->references('id_grupo')->on('ciiu_grupos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clases');
    }
}
