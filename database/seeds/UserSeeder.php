<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
			'email' => 'admin@store.com',
			'password' => Hash::make('123'),
			'name' => 'Jennifer Taylor',
			
			]);
        factory(App\User::class, 5)->create();
    }
}
