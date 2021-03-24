<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateButacasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('butacas', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('estado',['libre','ocupado'])->default('libre');
            $table->integer('columna_id')->unsigned();
            $table->integer('fila_id')->unsigned();
            // $table->integer('reserva_id')->unsigned();

            $table->foreign('columna_id')->references('id')->on('columnas');
            $table->foreign('fila_id')->references('id')->on('filas');
            // $table->foreign('reserva_id')->references('id')->on('reservas');
            
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
        Schema::dropIfExists('butacas');
    }
}
