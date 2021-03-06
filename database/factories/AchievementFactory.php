<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Achievement;
use Faker\Generator as Faker;

$factory->define(Achievement::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->text,
        'points' => $faker->randomDigit
    ];
});
