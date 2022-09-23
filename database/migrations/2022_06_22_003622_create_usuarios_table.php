<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('idusuario');
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('email',100);
            $table->string('telefono',20);
            $table->string('clave',100);
            $table->string('estado',11);
            $table->timestamps();

            $table->unsignedBigInteger('rolid');
            $table->foreign('rolid')->references('idrol')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
