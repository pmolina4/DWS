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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 40)-> unique();
            $table->double('precio', 7, 2);
            $table->date('fecha_lanzamiento')->nullable();
            $table->string('descripcion', 200)->nullable();
            //campo donde almacenamos la  fk de categoria (tiene que ser el mismo tipo que la id de la tabla foranea)
            $table->unsignedBigInteger('categoria_id')->nullable();
            //referenciamos el campo categoria_id con el id de la tabla categoria asi refereniamos con la tabla foranea
            $table->foreign('categoria_id')->references('id')->on('categorias');
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
        Schema::dropIfExists('productos');
    }
};
