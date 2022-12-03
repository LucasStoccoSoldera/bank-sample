<?php

namespace App\API;
/**
 * Codigos de retorno: https://developer.mozilla.org/pt-BR/docs/Web/HTTP/Status
 */
class Api
{
    public static function loginResponse($user, $token)
    {
        return [
            'data' => [
                'user'   => $user,
                'token'  => $token
            ]
            ];
    }

    public static function genericResponse($msg)
    {
        return [
            'data' => [
                'msg'   => $msg,
            ]
            ];
    }

    public static function bankShowResponse($bank)
    {
        return [
            'bank' => $bank
            ];
    }

    public static function bankReleasesShowResponse($financialTransactions)
    {
        return [
            'releases' => $financialTransactions
            ];
    }

    public static function financialTransactionShowResponse($financialTransactions)
    {
        return [
            'financialTransactions' => $financialTransactions
            ];
    }
}
