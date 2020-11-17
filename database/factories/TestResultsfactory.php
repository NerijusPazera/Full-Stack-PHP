<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TestResults;
use Faker\Generator as Faker;

$factory->define(TestResults::class, function (Faker $faker) {
    date_default_timezone_set('Europe/Vilnius');
    return [
        'user_id' => 2,
        'reaction_time' => 0.500,
        'date' => date('Y.m.d H:i')
    ];
});
