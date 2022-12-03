<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\bank;
use Illuminate\Http\Request;
use App\API\ApiError;
use App\Models\FinancialTransaction;

class bankController extends Controller
{

    private $bank;

    public function __construct(Bank $bank){
        $this->bank = $bank;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->bank->paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try{
            $bankData = $request->all();
            if(Bank::select()->where('conta','=',$request->conta)->first()){
                return response()->json(ApiError::errorMessage("A conta {$request->conta} ja existe!", 1040), 500);
            }

            $this->bank->create($bankData);

            $return = [
                "data"=> [
                    "msg" => "A conta {$request->conta} foi criada com sucesso!"
                ]
            ];

            return response()->json($return, 201);

        } catch(\Exception $e){
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1010), 500);
            }

            return response()->json(ApiError::errorMessage('Houve um erro ao realizar a operação de salvar', 1010), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bank = $this->bank->find($id);
        if(!$bank){
            return response()->json(ApiError::errorMessage('Conta não encontrada!', 4040), 404);
        }

        $data = [
            'bank' => $bank
        ];

        return response()->json($data);
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function showFinancialTransaction($id)
    {
        $bank = $this->bank->find($id);
        if(!$bank){
            return response()->json(ApiError::errorMessage('Conta não encontrada!', 4040), 404);
        }

        $financialTransactions = FinancialTransaction::where('conta_id', $id)->orderByDesc('created_at')->get();

        $data = [
            'releases' => $financialTransactions
        ];

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $bankData    = $request->all();
            $bank        = $this->bank->find($id);

            $bank->update($bankData);

                $return = [
                    'data'=> [
                        'msg' => 'Conta alterada com sucesso!'
                    ]
                ];

            return response()->json($return, 201);

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
     * @param  \App\Models\bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(bank $id)
    {
        try{
            $id->delete();

            return response()->json([
                'data' => [
                    'msg' => 'Conta: '.$id->id.' removido com sucesso!'
                ]
            ],200);

        }catch(\Exception $e){
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1010), 500);
            }

            return response()->json(ApiError::errorMessage('Houve um erro ao realizar a operação de remover', 1012), 500);
        }
    }
}
