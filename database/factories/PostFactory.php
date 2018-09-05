<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
	return [
		'title'=>$faker->text($maxNbChars = 50),
		'category_id'=>random_int(1, 10),
		'description'=>$faker->text($maxNbChars = 100),
		'content'=>$faker->text($maxNbChars = 300),
		'slug'=>$faker->slug(),
		'user_id'=>1,
		'thumbnail'=>$faker->imageUrl($width = 640, $height = 480),
	];
});
