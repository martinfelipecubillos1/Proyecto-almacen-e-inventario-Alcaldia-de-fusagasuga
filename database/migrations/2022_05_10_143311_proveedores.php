<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Proveedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedors',function(Blueprint $table){
            $table->id();
            $table->String('identificacion');
            $table->String('numero');
            $table->unsignedBigInteger('tipo');
            $table->String('nombreproveedor');
            $table->String('direccion');
            $table->String('correo');
            $table->String('telefono');
            $table->foreign('tipo')->references('id')->on('tipoproveedors');
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
        Schema::dropIfExists('proveedors');
    }
}
