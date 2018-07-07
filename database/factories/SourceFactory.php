<?php

use Faker\Generator as Faker;

$factory->define(\App\Source::class, function (Faker $faker) {
    return [
        'url' => $faker->url,
//        'type' => $faker->randomElement(['twitter', 'speech', 'interview', 'official website']),
        'raw_text' => $faker->paragraphs(),
    ];
});
