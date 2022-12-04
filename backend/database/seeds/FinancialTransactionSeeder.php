<?php

use Illuminate\Database\Seeder;
use App\Models\FinancialTransaction;

class FinancialTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(FinancialTransaction::class, 300)->create();
    }
}
