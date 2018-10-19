<?php

use Faker\Generator as Faker;

use App\Entities\User;
use App\Entities\Task;
use App\Entities\Project;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 5, $variableNbWords = true),
        'description' => $faker->text(200),
        'project_id' => Project::all()->random()->id,
        'user_id' => User::all()->random()->id,
        'position' => $faker->numberBetween(1, 11),
        'status' => $faker->randomElement(['backlog', 'in_progress', 'in_testing', 'completed']),
    ];
});
