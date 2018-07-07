<?php

use Faker\Generator as Faker;

$factory->define(\App\Vote::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'created_at' => $faker->dateTimeBetween()
    ];
});
