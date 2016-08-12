<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerLastseenTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('player_lastseen', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('player_id')->unsigned();
			$table->timestamp('left_at');
			$table->string('world');


			$table->foreign('player_id')->references('id')->on('players');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('player_lastseen');
    }

}
