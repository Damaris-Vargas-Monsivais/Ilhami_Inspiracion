<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id('idventa');
            $table->dateTime('fecha');
            $table->string('email',100);
            $table->string('direccion', 200);
            $table->text('resumen',255);
            $table->string('estado',11);

            $table->unsignedBigInteger('usuarioid');
            $table->foreign('usuarioid')->references('idusuario')->on('usuarios');
            $table->unsignedBigInteger('pagoid');
            $table->foreign('pagoid')->references('idpago')->on('pago');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
