<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Elementoinventarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elementoinventarios',function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('elemento');

            $table->string('placainterna')->nullable();
            $table->string('placaexterna')->nullable();
            $table->string('serial')->nullable();

            $table->string('preciounitario');
            $table->string('cantidad');
            $table->string('cantidadtotal');
            $table->string('preciototal');
            $table->unsignedBigInteger('contrato');
            $table->unsignedBigInteger('estado');
            $table->string('observaciones');
            $table->unsignedBigInteger('responsable');

            $table->boolean('asignado');
            $table->boolean('consumible');
            $table->boolean('baja');

            $table->foreign('elemento')->references('id')->on('elementos');
            $table->foreign('contrato')->references('id')->on('contratos');
            $table->foreign('estado')->references('id')->on('estados');
            $table->foreign('responsable')->references('id')->on('responsablespordependencias');
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
        Schema::dropIfExists('elementoinventarios');
    }
}

