<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubLineaInvestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_linea_invests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("id_linea_invest");
            $table->string("nombre",100);
            $table->text("descripcion");
            $table->rememberToken();
            $table->timestamps();
            $table->foreign("id_linea_invest")->references("id")->on("linea_invests")->delete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub__linea__invests');
    }
}
