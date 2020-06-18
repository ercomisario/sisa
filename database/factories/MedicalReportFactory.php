<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MedicalReport;
use Faker\Generator as Faker;

$factory->define(MedicalReport::class, function (Faker $faker) {
    return [
            'diagnostic' => $faker->text,
    ];
});
