<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->date('order_date')->nullable();//cuando se solicita el pedido
            $table->date('arrived_date')->nullable();//cuando se entregara el pedido
            $table->string('status');//Active, Pending, Approved, Cancelled, Finished
            
            //FK
            $table->float('total')->default(0.0);
            $table->integer('user_id')->unsigned();//a quien le pertenece
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('carts');
    }
}
