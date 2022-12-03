<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Bank;

class BankTest extends TestCase
{
    /**
     *
     *
     * @return void
     */
    public function shouldReturnIndexCounts()
    {
        $response = $this->get('/api/bank/');

        $response->assertStatus(200);
    }

    public function shouldReturnShowCountById()
    {
        $bank = factory(Bank::class, 1)->create();
        $bank_id = $bank->first()->id;
        $response = $this->get('/api/bank/' . $bank_id);

        $response->assertStatus(200);
    }

    public function testNotExistingCountWhenShowCountById()
    {
        $bank = factory(Bank::class, 1)->create();
        $bank_id = $bank->first()->id + 1;
        $response = $this->get('/api/bank/' . $bank_id);

        $response->assertStatus(404);
    }

    public function shouldStoreACount()
    {
        $response = $this->post('/api/bank/', [
            'conta' => 'teste',
            'total' => 100.00
        ]);

        $response->assertCreated();
    }

    public function testExistingCountWhenStoreACount()
    {
        $conta = Bank::all()->first()->conta;

        $response = $this->post('/api/bank/', [
            'conta' => $conta,
            'total' => 100.00
        ]);

        $response->assertStatus(500);
    }

    public function shouldUpdateACount()
    {

        $bank = factory(Bank::class, 1)->create();
        $bank_id = $bank->first()->id;
        $response = $this->put('/api/bank/' . $bank_id, [
            'conta' => 'teste',
            'total' => 100.00
        ]);

        $response->assertCreated();
    }

    public function shouldDeleteACount()
    {
        $bank = factory(Bank::class, 1)->create();
        $bank_id = $bank->first()->id;
        $response = $this->delete('/api/bank/' . $bank_id);

        $response->assertStatus(200);
    }
}
