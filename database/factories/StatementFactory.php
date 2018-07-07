<?php

use Faker\Generator as Faker;

$factory->define(\App\Statement::class, function (Faker $faker) {
    return [
        'statement' => $faker->paragraph,
        'created_at' => $faker->dateTimeBetween(),
    ];
});
