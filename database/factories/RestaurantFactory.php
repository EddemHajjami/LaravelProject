<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Link;
use Faker\Generator as Faker;

$factory->define(Link::class, function (Faker $faker) {
    return [
        'name' => substr($faker->sentence(2), 0, -1),
        'image' => $faker->image,
        'description' => $faker->description,
        'foodType' => $faker->foodType,
        'location' => $faker->location,
    ];
});
