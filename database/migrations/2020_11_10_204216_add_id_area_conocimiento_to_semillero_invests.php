<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdAreaConocimientoToSemilleroInvests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('semillero_invests', function (Blueprint $table) {
            $table->unsignedBigInteger('id_area_conocimiento')->after('id');
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
        Schema::table('semillero_invests', function (Blueprint $table) {
            $table->dropForeign('semillero_invests_id_area_conocimiento_foreign');
        });
    }
}
