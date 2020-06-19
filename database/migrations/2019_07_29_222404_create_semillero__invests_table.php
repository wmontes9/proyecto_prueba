<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemilleroInvestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semillero_invests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_area_conocimiento')->index(); 
            $table->string("nombre",100);
            $table->string("sigla",10);
            $table->text("logo");
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_area_conocimiento')->references('id_area_conocimiento')->on('area_conocimientos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('semillero_invests');
    }
}
