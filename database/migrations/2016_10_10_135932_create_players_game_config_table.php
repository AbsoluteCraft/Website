<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersGameConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('player_game_config', function (Blueprint $table) {
			$table->integer('player_id')->unsigned();
			$table->integer('game_id')->unsigned();
			$table->text('config');
			$table->timestamps();

			$table->foreign('player_id')->references('id')->on('players');
			$table->foreign('game_id')->references('id')->on('games');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
