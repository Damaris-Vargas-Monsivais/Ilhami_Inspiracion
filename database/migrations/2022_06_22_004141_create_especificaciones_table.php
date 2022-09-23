<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especificaciones', function (Blueprint $table) {
            $table->id('idespecificacion');
            $table->longText('descripcion', 100);

            $table->unsignedBigInteger('productoid');
            $table->foreign('productoid')->references('idproducto')->on('productos');
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
        Schema::dropIfExists('especificaciones');
    }
}
