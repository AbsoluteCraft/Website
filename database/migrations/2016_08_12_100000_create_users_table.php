<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 16);
			$table->string('uuid', 60);
			$table->integer('rank')->default(1);
            $table->string('email')->unique();
			$table->string('email_code', 60);
			$table->boolean('active')->default(0);
			$table->string('password');
			$table->rememberToken();

			$table->string('location');
			$table->boolean('public_location')->default(1);
			$table->date('dob');
			$table->boolean('public_dob')->default(1);
			$table->text('bio');
			$table->string('contact_email', 1024);
			$table->string('skype', 32);
			$table->string('facebook', 50);
			$table->string('twitter', 15);
			$table->string('steam', 32);
			$table->string('planetminecraft', 20);
			$table->string('youtube', 20);

			$table->integer('profile_background_id')->unsigned();

            $table->timestamps();
			$table->foreign('profile_background_id')->references('id')->on('profile_backgrounds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
