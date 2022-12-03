<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FinancialTransaction;
use App\Models\Bank;
use Faker\Generator as Faker;

$factory->define(FinancialTransaction::class, function (Faker $faker) {

    $movimento = array_rand(['deposit', 'withdraw']);

    return [
        'conta_id' => Bank::all()->random()->id,
        'movimento' => $movimento,
        'valor' => $this->faker->randomFloat(2,10,1000),
    ];
});
