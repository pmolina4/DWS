<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videojuegos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->unique();
            $table->double('precio');
            $table->integer('pegi');
            $table->string('descripcion');
            //campo donde almacenamos la  fk de videojuego (tiene que ser el mismo tipo que la id de la tabla foranea compania)
            $table->unsignedBigInteger('compania_id')->nullable();
            //referenciamos el campo compania_id con el id de la tabla compania asi refereniamos con la tabla foranea
            $table->foreign('compania_id')->references('id')->on('companias');
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
        Schema::dropIfExists('videojuegos');
    }
};
