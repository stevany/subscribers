<?php

use Faker\Generator as Faker;

$factory->define(App\Subscriber::class, function (Faker $faker) {
	
    return [
        //
        'email_address'=>$faker->unique()->safeEmail,
        'name' => $faker->sentence(3),
  		

    ];
});
