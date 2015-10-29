<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();

		$users = [
			'name' => 'James',
			'password'=> Hash::make('password'),
			'email' => 'example@example.com'
		];

		DB::table('users')->insert($users);
	}

}
