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
        Schema::create('valores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lista_id');
            $table->string('valor', 250);
            $table->timestamps();
            $table->foreign('lista_id')->references('id')->on('listas');
            $table->unique(['lista_id', 'valor']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_valores');
    }
};
