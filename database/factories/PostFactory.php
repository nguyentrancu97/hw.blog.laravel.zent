<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
	return [
		'title'=>$faker->text($maxNbChars = 200),
		'description'=>$faker->text($maxNbChars = 200),
		'content'=>$faker->text($maxNbChars = 200),
		'user_id'=>1,
		'slug'=>$faker->slug,
	];
});
