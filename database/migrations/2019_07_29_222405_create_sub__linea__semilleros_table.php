<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubLineaSemillerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_linea_semilleros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("id_sub_linea");
            $table->unsignedBigInteger("id_semillero");
            $table->rememberToken();
            $table->timestamps();
            //
            $table->foreign("id_sub_linea")->references("id")->on("sub_linea_invests")->delete("cascade");
            $table->foreign("id_semillero")->references("id")->on("semillero_invests")->delete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub__linea__semilleros');
    }
}
