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
        Schema::create('subcampos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campo_id');
            $table->unsignedBigInteger('subcampo_id');
            $table->integer('orden');
            $table->timestamps();

            $table->foreign('campo_id')->references('id')->on('campos');
            $table->foreign('subcampo_id')->references('id')->on('campos');
            $table->unique(['campo_id', 'subcampo_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_subcampos');
    }
};
