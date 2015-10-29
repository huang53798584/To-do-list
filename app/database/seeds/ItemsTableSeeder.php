<?php

class ItemsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('items')->delete();

		$items = [
			[
				'user_id' => 1,
				'name' => 'work',
				'done' => true
			],

			[
				'user_id' => 1,
				'name' => 'study',
				'done' => false
			],

			[
				'user_id' => 1,
				'name' => 'sleep',
				'done' => true
			]
		];

		DB::table('items')->insert($items);
	}

}
