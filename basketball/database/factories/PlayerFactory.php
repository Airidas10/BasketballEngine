<?php

use App\Player;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Player::class, function (Faker $faker) {

    $positions = ['PG', 'SG', 'SF', 'PF', 'C'];
    return [
        'first_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,      
        'nationality' => $faker->country,
        'height' => $faker->numberBetween($min = 175, $max = 230),
        'weight' => $faker->numberBetween($min = 70, $max = 140),
        'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'position' => $positions[(rand(0, count($positions) - 1))],
        'jump' => rand(1, 99),
        'speed' => rand(1, 99),
        'quickness' => rand(1, 99),
        'strength' => rand(1, 99),
        'stamina' => rand(1, 99),
        'hustle' => rand(1, 99),
        'durability' => rand(1, 99),
        'screening' => rand(1, 99),
        'catching' => rand(1, 99),
        'off_reb' => rand(1, 99),
        'def_reb' => rand(1, 99),
        'boxout' => rand(1, 99),
        'help_defense' => rand(1, 99),
        'shot_contest' => rand(1, 99),
        'stealing' => rand(1, 99),
        'blocking' => rand(1, 99),
        'fouling' => rand(1, 99),
        'finishing' => rand(1, 99),
        'mid_range_shot' => rand(1, 99),
        'three_point_shot' => rand(1, 99),
        'free_throws' => rand(1, 99),
        'ball_handling' => rand(1, 99),
        'passing' => rand(1, 99),
        'off_ball_movement' => rand(1, 99),
    ];
});