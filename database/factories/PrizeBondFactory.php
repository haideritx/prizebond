<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PrizeBond;
use App\Models\Denomination;
use Faker\Generator as Faker;

$factory->define(PrizeBond::class, function (Faker $faker) {
    return [
        'denomination_id' => $faker->numberBetween(1, Denomination::count()),
        'bond'=> $faker->randomNumber(6),
        'position' => $faker->numberBetween(1,3),
        'draw_date' => $faker->date(),
        'draw_date_raw_imported' => 'Just a Faker, Not an Import',
        'held_at_location' => $faker->city,
        'draw_number' => $faker->unique()->randomNumber(),
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime()
    ];
});
