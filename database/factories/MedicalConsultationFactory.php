<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MedicalConsultation;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(MedicalConsultation::class, function (Faker $faker) {
    $date = Carbon::now();
    return [
            'agreeded_date' => $date->addDays(rand(1,10)),
            'reason' => $faker->sentence,
            'attention_type_id' => 3,
            'secretary_id' =>rand(1,2)
    ];
});
