<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('tipos_identificacion')){
            Schema::create('usuarios', function (Blueprint $table) {
                $table->unsignedBigInteger('id_usuario')->autoIncrement();
                $table->unsignedBigInteger('id_identificacion');
                $table->string('nombre');
                $table->string('apellido');            
                $table->string("num_identificacion");
                $table->text('direccion');
                $table->string('telefono'); 
                $table->string('nombre_usuario');

                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
                $table->string('estado')->default('activo');

                $table->foreign('id_identificacion')->references('id_tipo_identificacion')->on('tipos_identificacion');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
