<?php

use Faker\Generator as Faker;

use App\Entities\User;
use App\Entities\Payment;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        'amount' => $faker->numberBetween(10, 250),
        'user_id' => User::all()->random()->id,
        'status' => $faker->randomElement(['pending', 'approved', 'error']),
    ];
});
