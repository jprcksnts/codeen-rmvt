<?php

use Faker\Generator as Faker;

$factory->define(\App\Withdrawal::class, function (Faker $faker) {
    return [
        'clients_id' => $faker->numberBetween(1, 50),
        'amount' => $faker->numberBetween(100, 100000),
        'created_at' => $faker->dateTimeBetween('-1 years', 'now')
    ];
});
