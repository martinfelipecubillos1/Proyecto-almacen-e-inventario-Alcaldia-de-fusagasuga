<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Responsables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsables',function(Blueprint $table){
            $table->id();
            $table->String('cedula')->unique();
            $table->String('nombre');
            $table->String('cargo');
            $table->String('correo')->unique();
            $table->String('numero');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('responsables');
    }
}
