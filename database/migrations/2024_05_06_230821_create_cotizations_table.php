<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombrepro');
            $table->date('fechacotizacion')->nullable();
            $table->string('observaciones');
            $table->float('price');
            $table->enum('manoobra', ['SI', 'NO'])->default('SI')->nullable();
            $table->float('total_manoobra');
            $table->float('iva');
            $table->float('total');


            $table->integer('clienteId')->unsigned();
            $table->unsignedBigInteger('usuarioId');


            $table->foreign('clienteId')->references('id')->on('clientes');
            $table->foreign('usuarioId')->references('id')->on('users');

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
        Schema::dropIfExists('cotizations');
    }
}
