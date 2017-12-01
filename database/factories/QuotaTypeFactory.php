<?php

use Faker\Generator as Faker;

$factory->define(\App\QuotaTypes::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name(),
        'goal' => $faker->numberBetween(2000000,10000000),
        'created_at' => $faker->dateTimeBetween('-1 years', 'now'),
    ];
});
