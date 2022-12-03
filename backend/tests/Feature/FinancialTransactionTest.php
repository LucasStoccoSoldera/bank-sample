<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\FinancialTransaction;
use App\Models\Bank;

class FinancialTransactionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function shouldReturnIndexFinancialTransactions()
    {
        $response = $this->get('/api/release/');

        $response->assertStatus(200);
    }

    public function shouldReturnShowFinancialTransactionById()
    {
        $FinancialTransaction = factory(FinancialTransaction::class, 1)->create();
        $FinancialTransaction_id = $FinancialTransaction->first()->id;
        $response = $this->get('/api/release/' . $FinancialTransaction_id);

        $response->assertStatus(200);
    }

    public function testNotExistingFinancialTransactionByIdWhenShowFinancialTransactionById()
    {
        $FinancialTransaction = factory(FinancialTransaction::class, 1)->create();
        $FinancialTransaction_id = $FinancialTransaction->first()->id + 1;
        $response = $this->get('/api/release/' . $FinancialTransaction_id);

        $response->assertStatus(404);
    }


    public function shouldStoreDepositFinancialTransaction()
    {
        $response = $this->post('/api/release/', [
            'conta_id' => 'teste',
            'movimento' => 'deposit',
            'valor' => 100.00
        ]);

        $response->assertCreated();
    }

    public function shouldStoreWithdrawFinancialTransaction()
    {
        $FinancialTransaction = factory(FinancialTransaction::class, 1)->create();
        $FinancialTransaction_id = $FinancialTransaction->first()->id;
        $response = $this->post('/api/release/', [
            'conta_id' =>  $FinancialTransaction_id,
            'movimento' => 'withdraw',
            'valor' => 100.00
        ]);

        $response->assertCreated();
    }

    public function testRequestCountIdWhenAddFinancialTransaction()
    {
        $response = $this->post('/api/release/', [
            'movimento' => 'withdraw',
            'valor' => 100.00
        ]);

        $response->assertStatus(302);
    }

    public function testRequestMovimentWhenAddFinancialTransaction()
    {

        $FinancialTransaction = factory(FinancialTransaction::class, 1)->create();
        $FinancialTransaction_id = $FinancialTransaction->first()->id;
        $response = $this->post('/api/release/', [
            'conta_id' => $FinancialTransaction_id,
            'valor' => 100.00
        ]);

        $response->assertStatus(302);
    }

    public function testRequestValorWhenAddFinancialTransaction()
    {

        $FinancialTransaction = factory(FinancialTransaction::class, 1)->create();
        $FinancialTransaction_id = $FinancialTransaction->first()->id;
        $response = $this->post('/api/release/', [
            'conta_id' => $FinancialTransaction_id,
            'movimento' => 'withdraw'
        ]);

        $response->assertStatus(302);
    }

    public function testNotExistingCountWhenStoreFinancialTransaction()
    {

        $bank = factory(Bank::class, 1)->create();
        $conta_id = $bank->first()->id + 1;
        $response = $this->post('/api/release/', [
            'conta_id' => $conta_id,
            'movimento' => 'withdraw',
            'valor' => 100.00
        ]);

        $response->assertStatus(500);
    }


    public function shouldUpdateAFinancialTransaction()
    {

        $FinancialTransaction = factory(FinancialTransaction::class, 1)->create();
        $FinancialTransaction_id = $FinancialTransaction->first()->id;
        $response = $this->put('/api/release/' . $FinancialTransaction_id, [
            'conta_id' => $FinancialTransaction_id,
            'movimento' => 'withdraw',
            'valor' => 100.00
        ]);

        $response->assertCreated();
    }

    public function testNotExistingFinancialTransactionWhenUpdateFinancialTransaction()
    {

        $FinancialTransaction = factory(FinancialTransaction::class, 1)->create();
        $FinancialTransaction_id = $FinancialTransaction->first()->id + 1;
        $bank = factory(Bank::class, 1)->create();
        $conta_id = $bank->first()->id;
        $response = $this->put('/api/release/'. $FinancialTransaction_id, [
            'conta_id' => $conta_id,
            'movimento' => 'withdraw',
            'valor' => 100.00
        ]);

        $response->assertStatus(404);
    }

    public function testNotExistingCountWhenUpdateFinancialTransaction()
    {

        $FinancialTransaction = factory(FinancialTransaction::class, 1)->create();
        $FinancialTransaction_id = $FinancialTransaction->first()->id;
        $bank = factory(Bank::class, 1)->create();
        $conta_id = $bank->first()->id + 1;
        $response = $this->put('/api/release/'. $FinancialTransaction_id, [
            'conta_id' => $conta_id,
            'movimento' => 'withdraw',
            'valor' => 100.00
        ]);

        $response->assertStatus(500);
    }

    public function shouldDeleteAFinancialTransaction()
    {
        $FinancialTransaction = factory(FinancialTransaction::class, 1)->create();
        $FinancialTransaction_id = $FinancialTransaction->first()->id;
        $response = $this->delete('/api/release/' . $FinancialTransaction_id);

        $response->assertStatus(200);
    }

    public function testNotExistingFinancialTransactionWhenDeleteFinancialTransaction()
    {

        $FinancialTransaction = factory(FinancialTransaction::class, 1)->create();
        $FinancialTransaction_id = $FinancialTransaction->first()->id + 1;
        $response = $this->delete('/api/release/' . $FinancialTransaction_id);

        $response->assertStatus(404);
    }


}
