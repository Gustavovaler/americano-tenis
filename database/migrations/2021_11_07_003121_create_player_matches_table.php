<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_matches', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('player_1');
            $table->unsignedBigInteger('player_2');
            $table->integer('resultado_player_1')->default(0);
            $table->integer('resultado_player_2')->default(0);
            $table->boolean('jugado')->default(false);
            $table->boolean('cancelado')->default(false);
            $table->string('torneo')->default('0000');
            $table->foreign('player_1')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('player_2')->references('id')->on('players')->onDelete('cascade');
            $table->string('zona')->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_matches');
    }
}
