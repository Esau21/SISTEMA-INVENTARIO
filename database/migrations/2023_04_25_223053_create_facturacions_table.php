<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturacions', function (Blueprint $table) {
            $table->increments('id');
            $table->float('monto');
            $table->float('saldo');
            $table->enum('estado', ['CANCEL', 'PEDING', 'PARTIAL'])->default('CANCEL');
            $table->string('tipo_documento');
            $table->float('iva');
            $table->timestamp('fecha_emision');
            $table->timestamp('fecha_vencimiento');
            $table->string('notas');
            $table->float('descuento');
            $table->float('subtotal');
            $table->float('total_pagado');
            $table->timestamps();


            $table->unsignedBigInteger('id_producto');
            $table->integer('id_cliente')->unsigned();

            $table->foreign('id_producto')->references('id')->on('products');
            $table->foreign('id_cliente')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturacions');
    }
}
