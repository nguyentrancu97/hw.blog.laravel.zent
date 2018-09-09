<?php

use Faker\Generator as Faker;

$factory->define(App\PostTag::class, function (Faker $faker) {
    return [
        'post_id'=>random_int(1, 20),
        'tag_id'=>random_int(1,20),
    ];
});
