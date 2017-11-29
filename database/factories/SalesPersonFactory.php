<?php

use Faker\Generator as Faker;

$factory->define(\App\SalesPerson::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstNameMale,
        'middle_name' => $faker->lastName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password ' => $faker->password(8, 32),
        'quota_id' => $faker->numberBetween(1, 3),
        'created_at' => $faker->dateTimeBetween('-1 years', 'now'),
    ];
});
