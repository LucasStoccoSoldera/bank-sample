<?php

use App\FinancialTransaction;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
           // factory(User::class, 1)->create(),
            BankSeeder::class,
            FinancialTransactionSeeder::class,]);
    }
}
