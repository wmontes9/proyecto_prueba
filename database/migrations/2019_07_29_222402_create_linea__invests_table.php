<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLineaInvestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linea_invests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("id_grupo_invest");
            $table->string("nombre",100);
            $table->text("descripcion");
            $table->rememberToken();
            $table->timestamps();
            //
            $table->foreign("id_grupo_invest")->references("id")->on("grupo_invests")->delete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('linea_invests');
    }
}
