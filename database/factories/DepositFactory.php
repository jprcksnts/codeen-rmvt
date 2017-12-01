<?php

use Faker\Generator as Faker;

$factory->define(\App\Deposit::class, function (Faker $faker) {
    return [
        'clients_id' => $faker->numberBetween(1, 10),
        'amount' => $faker->numberBetween(100, 100000),
        'created_at' => $faker->dateTimeBetween('-1 years', 'now')
    ];
});
