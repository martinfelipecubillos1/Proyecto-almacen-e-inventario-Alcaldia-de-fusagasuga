<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Contactoproveedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactoproveedors',function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('proveedor');
            $table->String('nombreempresa');
            $table->String('numero');
            $table->String('direccion');
            $table->String('correo');
            $table->String('telefono');
            $table->foreign('proveedor')->references('id')->on('proveedors');
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
        Schema::dropIfExists('contactoproveedors');
    }
}
