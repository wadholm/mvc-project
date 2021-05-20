<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result', function (Blueprint $table) {
            $table->id();
            $table->integer('aces');
            $table->integer('twos');
            $table->integer('threes');
            $table->integer('fours');
            $table->integer('fives');
            $table->integer('sixes');
            $table->integer('sum');
            $table->integer('bonus');
            $table->integer('pair');
            $table->integer('twopair');
            $table->integer('threeofakind');
            $table->integer('fourofakind');
            $table->integer('smallstraight');
            $table->integer('largestraight');
            $table->integer('fullhouse');
            $table->integer('chance');
            $table->integer('yatzy');
            $table->integer('total');
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
        Schema::dropIfExists('result');
    }
}
