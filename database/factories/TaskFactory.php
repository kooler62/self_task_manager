<?php

use Faker\Generator as Faker;
use App\Entities\Task;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 5, $variableNbWords = true),
        'description' => $faker->text(200),
        'project_id' => $faker->numberBetween(1, 100),
        'position' => $faker->numberBetween(1, 11),
        'status' => $faker->randomElement(['backlog', 'in_progress', 'in_testing', 'completed']),
    ];
});
