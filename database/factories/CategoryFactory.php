<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
	return [
		'name'=>$faker->name,
		'thumbnail'=>$faker->text($maxNbChars = 200),
		'slug'=>$faker->slug,
		'description'=>$faker->text($maxNbChars = 200),
	];
});
