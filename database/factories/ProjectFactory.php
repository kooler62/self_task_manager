<?php

use Faker\Generator as Faker;
use App\Entities\Project;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'user_id' => $faker->numberBetween(1, 10),
        'status' => $faker->randomElement(['opened', 'closed']),
    ];
});
