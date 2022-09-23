<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->id('iddetalleventa');
            $table->decimal('precio_unitario');
            $table->integer('cantidad');

            $table->unsignedBigInteger('ventaid');
            $table->foreign('ventaid')->references('idventa')->on('ventas');
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
        Schema::dropIfExists('detalle_venta');
    }
}
