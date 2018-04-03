<?php

use Illuminate\Database\Seeder;

class SubscriberFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Subscriber::class,2)->create()->each(function($subscriber){
        	$subscriber->fields()->saveMany(
        		factory(App\Field::class,2)->create());
        });
    }
}
