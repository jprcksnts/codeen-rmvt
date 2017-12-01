<?php

use Faker\Generator as Faker;

$factory->define(\App\Client::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'middle_name' => $faker->lastName,
        'last_name' => $faker->lastName,
        'balance' => $faker->numberBetween(10000, 100000),
        'salesperson_id' => $faker->numberBetween(1, 3),
        'acc_no'=>$faker->bankAccountNumber,
        'action_log' => $faker ->numberBetween(0,1),
        'created_at' => $faker->dateTimeBetween('-1 years', 'now')
    ];
});
