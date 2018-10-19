<?php

use Faker\Generator as Faker;

use App\Entities\User;
use App\Entities\Project;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'user_id' => User::all()->random()->id,
        'status' => $faker->randomElement(['opened', 'closed']),
    ];
});
