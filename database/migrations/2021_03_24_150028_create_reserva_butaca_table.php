<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaButacaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('butaca_reserva', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('reserva_id')->unsigned()->index();
            $table->foreign('reserva_id')->references('id')->on('reservas')->onDelete('cascade');
            $table->integer('butaca_id')->unsigned()->index();
            $table->foreign('butaca_id')->references('id')->on('butacas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('butaca_reserva');
    }
}
