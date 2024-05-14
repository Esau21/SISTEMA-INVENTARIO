<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaquinariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maquinarias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->enum('status', ['PRESTADO', 'DISPONIBLE', 'EN-ESPERA', 'RETARDADO', 'ENTREGADO'])->default('DISPONIBLE');
            $table->date('fecha_salida');
            $table->date('fecha_entrega');
            $table->time('hora_salida');
            $table->time('hora_entrega');
            $table->float('price');
            $table->float('iva');
            $table->float('total');
            $table->string('year');
            $table->string('model');

            $table->integer('clienteId')->unsigned();



            $table->foreign('clienteId')->references('id')->on('clientes');
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
        Schema::dropIfExists('maquinarias');
    }
}
