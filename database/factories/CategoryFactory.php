<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
	return [
		'name'=>$faker->name,
		'thumbnail'=>$faker->imageUrl($width = 640, $height = 480),
		'description'=>$faker->text($maxNbChars = 200),
		'slug'=>$faker->slug,
		'parent_id'=>random_int(1, 3),
	];
});
