<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUrlImagenToEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eventos', function (Blueprint $table) {
            $table->string('url_imagen')->after('ponentes');
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
            $table->dropColumn('url_imagen');
        });
    }
}
