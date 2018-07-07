<?php

use Faker\Generator as Faker;

$factory->define(\App\SourceAuthor::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName .  ' ' . $faker->lastName,
        'type' => 'blog',
        'url' => $faker->url
    ];
});
