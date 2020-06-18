<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Location;
use Faker\Generator as Faker;

$factory->define(Location::class, function (Faker $faker) {
    return [
            'calle' => strval(rand(1,25)),
            'home' => strval(rand(1,100)),
            'sector_id' => rand(1,14),
    ];
});
