<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->decimal('total', 10, 2);
            $table->integer('items');
            $table->float('iva');
            $table->decimal('cash', 10, 2);
            $table->decimal('change', 10, 2);
            $table->enum('status', ['PAID', 'PENDING', 'CANCELLED'])->default('PAID');
            $table->unsignedBigInteger('user_id');

            $table->integer('cliente_id')->unsigned();


            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cliente_id')->references('id')->on('clientes');

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
        Schema::dropIfExists('sales');
    }
}
