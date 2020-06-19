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
        
        Schema::create('usuarios', function (Blueprint $table) {
            $table->unsignedBigInteger('id_usuario')->autoIncrement();
            $table->unsignedBigInteger('id_municipio');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('tipo_documento');            
            $table->string("num_identificacion");
            $table->text('direccion');
            $table->string('telefono'); 
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('estado')->default('activo');
            $table->boolean('administrador');
            $table->boolean('staf');
            $table->boolean('activo');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('id_municipio')->references('id_municipio')->on('municipios');
        });
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
