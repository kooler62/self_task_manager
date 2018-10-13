<?php

use Faker\Generator as Faker;
use App\Entities\User;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'points' => $faker->numberBetween(100, 1000),
        'avatar' => $faker->imageUrl(200, 200),
    ];
});
