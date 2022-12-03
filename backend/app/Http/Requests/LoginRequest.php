<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ];
    }

    public function message()
    {
        return [
            'email.required' => 'E-mail obrigatório.',
            'email.email' => 'O E-mail informado é inválido.',
            'password.required' => 'Senha obrigatória.'
        ];
    }
}
