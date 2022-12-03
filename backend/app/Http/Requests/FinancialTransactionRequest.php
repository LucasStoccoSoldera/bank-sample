<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\API\ApiError;
use \Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class FinancialTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'conta_id' => 'required',
            'movimento' => 'required',
            'valor' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'conta_id.required' => 'Conta obrigatória.',
            'movimento.required' => 'Movimento obrigatório.',
            'valor.required' => 'Valor obrigatório.'
        ];
    }
}
