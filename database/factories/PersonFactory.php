<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Person;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

$factory->define(Person::class, function (Faker $faker) {
    $date = Carbon::now();
    return [
            'name' => $faker->name,
            'last_name' => $faker->name,
            'cedula' => strval(rand(20000000,30000000)),
            'birthday' => $date->subYears(rand(15,30)),
            'social_number' => strval(rand(20000000,30000000)),
            'phone' => '000-000-0000',
            'sexo' => $faker->randomElement(['Femenino','Masculino']),
            'blood_type_id' => rand(1,8),
            
    ];
});
