<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('zona');
            $table->integer('games_ganados')->default(0);
            $table->integer('games_perdidos')->default(0);
            $table->integer('puntos')->default(0);
            $table->boolean('qf')->default(false);
            $table->boolean('sf')->default(false);
            $table->boolean('f')->default(false);
            $table->boolean('w')->default(false);
            $table->integer('jugados')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
