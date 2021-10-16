<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atores', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('altura', 5);
            $table->string('peso', 5);
            $table->string('manequim');
            $table->string('sexo', 20);
            $table->date('data_nasc', 3);
            $table->integer('sapato');
            $table->string('pele', 20);
            $table->string('olhos', 20);
            $table->string('cabelo', 20);
            $table->string('video');
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('atores');
    }
}
