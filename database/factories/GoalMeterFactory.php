<?php

use Faker\Generator as Faker;

$factory->define(\App\GoalMeters::class, function (Faker $faker) {
    return [
        //
        'sales_person_id' => $faker->numberBetween(1,4),
        'quarter' => $faker->numberBetween(1,4),
        'year' => $faker->year('now'),
        'amount' => $faker->numberBetween(2000000,10000000),
        'created_at' => $faker->dateTimeBetween('-1 years', 'now'),
    ];
});
