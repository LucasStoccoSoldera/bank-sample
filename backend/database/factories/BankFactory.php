<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Bank;
use Faker\Generator as Faker;

$factory->define(Bank::class, function (Faker $faker) {
    return [
        'conta' => $this->faker->name,
        'total' => $this->faker->randomFloat(2,10,1000),
    ];
});
