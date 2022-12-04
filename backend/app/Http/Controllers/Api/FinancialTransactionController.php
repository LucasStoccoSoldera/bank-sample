<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FinancialTransaction;
use App\Models\Bank;
use App\Http\Requests\FinancialTransactionRequest;
use App\API\ApiError;
use App\API\Api;

class FinancialTransactionController extends Controller
{

    private $financialTransaction;
    private $bank;

    public function __construct(FinancialTransaction $financialTransaction, Bank $bank){
        $this->financialTransaction = $financialTransaction;
        $this->bank = $bank;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json($this->financialTransaction->paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FinancialTransaction  $financialTransaction
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(FinancialTransactionRequest $financialTransactionRequest)
    {
        try{
            $bank =  $this->bank->find($financialTransactionRequest->conta_id);
                if(!$bank){
                    return response()->json(ApiError::errorMessage("Conta não localizada com a conta_id {$financialTransactionRequest->conta_id}!", 1030), 500);
                }

            $total_anterior=$bank->total;

            if($financialTransactionRequest->movimento == "deposit"){
                $bank->total = $bank->total+$financialTransactionRequest->valor;
            }

            if($financialTransactionRequest->movimento == "withdraw"){
                $bank->total = $bank->total-$financialTransactionRequest->valor;
            }

            $bank->save();
            $financialTransactioData = $financialTransactionRequest->all();
            $this->financialTransaction->create($financialTransactioData);

            return response()->json(Api::genericResponse("{$financialTransactionRequest->movimento} realizado. Total anterior:{$total_anterior}. Valor Movimentado:{$financialTransactionRequest->valor}. Total Atual:{$bank->total}."), 201);

        } catch(\Exception $e){
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1010), 500);
            }

            return response()->json(ApiError::errorMessage('Houve um erro ao realizar a operação de atualizar', 1011), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $financialTransaction = $this->financialTransaction->find($id);
        if(!$financialTransaction){
            return response()->json(ApiError::errorMessage('Transação não encontrada!', 4040), 404);
        }

        return response()->json(Api::financialTransactionShowResponse($financialTransaction));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FinancialTransaction  $financialTransaction
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(FinancialTransactionRequest $financialTransactionRequest, $id)
    {
        try{
            $financialTransactionData    = $financialTransactionRequest->all();
            $financialTransaction        = $this->financialTransaction->find($id);

            if(!$financialTransaction){
                return response()->json(ApiError::errorMessage('Transação não encontrada!', 4040), 404);
            }


            $bank =  $this->bank->find($financialTransactionRequest->conta_id);
            if(!$bank){
                return response()->json(ApiError::errorMessage("Conta não localizada com a conta_id {$financialTransactionRequest->conta_id}!", 1030), 500);
            }

            $total_anterior = $bank->total;

            if($financialTransaction->movimento == "deposit"){
                $bank->total = $bank->total-$financialTransaction->valor;
            }

            if($financialTransaction->movimento == "withdraw"){
                $bank->total = $bank->total+$financialTransaction->valor;
            }

            $total_pre_movimento = $bank->total;

            if($financialTransactionRequest->movimento == "deposit"){
                $bank->total = $bank->total+$financialTransactionRequest->valor;
            }

            if($financialTransactionRequest->movimento == "withdraw"){
                $bank->total = $bank->total-$financialTransactionRequest->valor;
            }

            $financialTransaction->update($financialTransactionData);
            $bank->save();

            return response()->json(Api::genericResponse("{$financialTransactionRequest->movimento} realizado. Total pré movimentação original:{$total_pre_movimento}. Total anterior:{$total_anterior}. Valor Movimentado:{$financialTransactionRequest->valor}. Total Atual:{$bank->total}."), 201);

        } catch(\Exception $e){
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1010), 500);
            }

            return response()->json(ApiError::errorMessage('Houve um erro ao realizar a operação de atualizar', 1011), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try{
            $financialTransaction        = $this->financialTransaction->find($id);
            if(!$financialTransaction){
                return response()->json(ApiError::errorMessage('Transação não encontrada!', 4040), 404);
            }

            $bank =  $this->bank->find($financialTransaction->conta_id);
            if(!$bank){
                return response()->json(ApiError::errorMessage("Conta não localizada com a conta_id {$financialTransaction->conta_id}!", 1030), 500);
            }

            $total_anterior = $bank->total;

            if($financialTransaction->movimento == "deposit"){
                $bank->total = $bank->total-$financialTransaction->valor;
            }

            if($financialTransaction->movimento == "withdraw"){
                $bank->total = $bank->total+$financialTransaction->valor;
            }

            $bank->save();
            $financialTransaction->delete();

            return response()->json(Api::genericResponse("Transação:$financialTransaction->id removida com sucesso!
            $financialTransaction->movimento de $financialTransaction->valor revertido. Total atual:$bank->total."),200);

        }catch(\Exception $e){
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1010), 500);
            }

            return response()->json(ApiError::errorMessage('Houve um erro ao realizar a operação de remover', 1012), 500);
        }
    }
}
