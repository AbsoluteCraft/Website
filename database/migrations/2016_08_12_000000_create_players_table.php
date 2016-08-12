<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('players', function (Blueprint $table) {
			$table->increments('id');
			$table->string('uuid', 60);
			$table->string('username', 16);
			$table->boolean('online');
			$table->timestamp('first_joined');
			$table->integer('tokens')->default(0);
			$table->string('country_code', 2)->nullable()->default(null);

			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('players');
    }

}
