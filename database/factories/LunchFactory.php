<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Lunch::class, function (Faker $faker) {
    return [
        "restaurant_id" => \App\Models\Restaurant::inRandomOrder()->first()->id,
        "user_id" => \App\User::inRandomOrder()->first()->id,
        "description" => $faker->text,
        "date" => $faker->dateTimeBetween('now', '+1 week')
    ];
});
