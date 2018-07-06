<?php

use Faker\Generator as Faker;

$factory->define(\App\Promise::class, function (Faker $faker) {
    return [
        'promise_made' => $faker->sentence()
    ];
});
