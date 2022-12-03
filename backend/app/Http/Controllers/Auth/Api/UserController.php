<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\API\ApiError;
use App\API\Api;

class UserController extends Controller
{
    public function register(UserRequest $userRequest, User $user){
        try {
            $userData = $userRequest->only('name', 'email', 'password');
            $userData['password'] = bcrypt($userData['password']);

            if(!$user = $user->create($userData)){
                return response()->json(ApiError::errorMessage('Não foi possível criar o login!', 0004), 500);
            }

            return response()->json(Api::loginResponse($user, ''), 200);

        } catch (\Throwable $e) {
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 0005), 500);
            }

            return response()->json(ApiError::errorMessage('Não foi possível criar o login.', 0006), 500);
        }
    }
}
