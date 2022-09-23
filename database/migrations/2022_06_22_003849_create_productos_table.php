<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('idproducto');
            $table->string('nombre', 100);
            $table->longText('descripcion', 100);
            $table->decimal('precio',12,2);
            $table->integer('stock')->default(0);
            $table->string('sku',8);
            $table->string('estado',11);

            $table->unsignedBigInteger('categoriaid');
            $table->foreign('categoriaid')->references('idcategoria')->on('categorias');
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
        Schema::dropIfExists('productos');
    }
}
