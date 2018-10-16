<?php

use Faker\Generator as Faker;
use App\Entities\User;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('111111'),
        'remember_token' => str_random(10),
        'points' => $faker->numberBetween(100, 1000),
        'avatar' => $faker->imageUrl(200, 200),
        'is_admin' => 0,
    ];
});
