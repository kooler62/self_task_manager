<?php

use Faker\Generator as Faker;
use App\Entities\Payment;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        'amount' => $faker->numberBetween(10, 250),
        'user_id' => $faker->numberBetween(1, 10),
        'status' => $faker->randomElement(['pending', 'success', 'error']),
    ];
});
