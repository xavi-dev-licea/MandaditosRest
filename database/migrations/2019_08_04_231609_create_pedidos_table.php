<?php

use APIMandaditos\Pedido;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description', 1000);
            $table->dateTime('date');
            $table->string('ubication_origin');
            $table->string('ubication_destiny');
            $table->string('status')->default(Pedido::PEDIDO_PENDIENTE);
            $table->integer('cliente_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();//Eliminación suave

            $table->foreign('cliente_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
