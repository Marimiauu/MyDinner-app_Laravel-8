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
        Schema::create('ingredientes', function (Blueprint $table) {
            $table->BigIncrements('Id');
            $table->unsignedBigInteger('IdClasification');
            $table->foreign('IdClasification')->references('Id')->on('clasificaciones');
            $table->String('Imagen');
            $table->String('Nombre');
            $table->String('Descripcion');
            $table->integer('Cantidad');
            $table->boolean('Estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredientes');
    }
};
