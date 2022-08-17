<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transpasos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transpasos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('responsableanterior');
            $table->unsignedBigInteger('movimientorelacionado');
            $table->unsignedBigInteger('responsablenuevo');

            $table->unsignedBigInteger('actualiza');


            $table->foreign('movimientorelacionado')->references('id')->on('elementoinventarios');
            $table->foreign('responsablenuevo')->references('id')->on('responsablespordependencias');

            $table->foreign('responsableanterior')->references('id')->on('responsablespordependencias');

            $table->foreign('actualiza')->references('id')->on('users');
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
        Schema::dropIfExists('transpasos'); //
    }
}
