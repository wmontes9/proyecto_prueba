<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eventos', function (Blueprint $table) {
            $table->renameColumn('fecha', 'fecha_inicio');
            $table->unsignedBigInteger('id_usuario')->index()->after('id');
            $table->date('fecha_fin')->after('fecha');

            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eventos', function (Blueprint $table) {
            $table->renameColumn('fecha_inicio', 'fecha');
            $table->dropForeign('eventos_id_usuario_foreign');
            $table->dropColumn('fecha_fin');
        });
    }
}
