<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\Models\Player\Background::create([
        	'url' => 'plains.jpg'
		]);

        \App\Models\User::create([
        	'username' => 'TeamAbsolute',
			'uuid' => '371e57a02c0e4875ab952373447b63db',
			'email' => 'test@absolutecraft.co.uk',
			'password' => app('hash')->make('secret'),
			'profile_background_id' => 1
		]);
    }

}
