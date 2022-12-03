<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Http;
use App\API\ApiError;
use App\API\Api;

class LoginController extends Controller
{
    public function login(LoginRequest $loginRequest)
    {
        try {
            $credentials = $loginRequest->only('email', 'password');

            if (!auth()->attempt($credentials)) {
                return response()->json(ApiError::errorMessage('Usuário ou senha inválidos!', 0001), 401);
            }

            $token = auth()->user()->createToken('auth_token');
            return response()->json(Api::loginResponse($credentials['email'], $token->plainTextToken), 200);

        } catch (\Throwable $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::errorMessage($e->getMessage(), 0002), 500);
            }

            return response()->json(ApiError::errorMessage('Não foi possível realizar o login.', 0003), 500);
        }
    }
    public function logout()
    {
        try {
            auth()->user()->currentAccessToken()->delete();
            return response()->json(Api::genericResponse('Logout realizado com sucesso!'), 204);
        } catch (\Throwable $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::errorMessage($e->getMessage(), 0003), 500);
            }

            return response()->json(ApiError::errorMessage('Não foi possível realizar o login.', 0003), 500);
        }
    }
}
