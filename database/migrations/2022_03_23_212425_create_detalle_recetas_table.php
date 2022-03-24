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
        Schema::create('detalle_recetas', function (Blueprint $table) {
            $table->BigIncrements('IdDetalle');
            $table->String('Nombre');
            $table->unsignedBigInteger('IdIngrediente');
            $table->foreign('IdIngrediente')->references('Id')->on('ingredientes');
            // $table->unsignedBigInteger('IdReceta');
            // $table->foreign('IdReceta')->references('Id')->on('Recetas');
            $table->Integer('Cantidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_recetas');
    }
};
