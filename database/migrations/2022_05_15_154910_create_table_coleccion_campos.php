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
        Schema::create('coleccion_campos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coleccion_id');
            $table->unsignedBigInteger('campo_id');
            $table->integer('orden')->default(1);
            $table->unsignedBigInteger('secuencia_id')->nullable();
            $table->unsignedBigInteger('lista_id')->nullable();
            $table->boolean('editable')->default(true);
            $table->boolean('obligatorio')->default(false);
            $table->boolean('unico')->default(false);
            $table->timestamps();

            $table->foreign('coleccion_id')->references('id')->on('colecciones');
            $table->foreign('campo_id')->references('id')->on('campos');
            $table->foreign('secuencia_id')->references('id')->on('secuencias');
            $table->foreign('lista_id')->references('id')->on('listas');

            $table->unique(['coleccion_id', 'campo_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_coleccion_campos');
    }
};
