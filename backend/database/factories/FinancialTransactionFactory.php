<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FinancialTransaction;
use App\Models\Bank;
use Faker\Generator as Faker;

$factory->define(FinancialTransaction::class, function (Faker $faker) {

    $opcoes = ['deposit', 'withdraw'];
    $movimento = array_rand($opcoes);

    return [
        'conta_id' => Bank::all()->random()->id,
        'movimento' => $opcoes[$movimento],
        'valor' => $this->faker->randomFloat(2,10,1000),
    ];
});
