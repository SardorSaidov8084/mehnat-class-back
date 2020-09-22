<?php


namespace App\Http\Controllers\Traits;


use App\Http\Controllers\ApiResponse\ApiResponse;
use Illuminate\Http\Exceptions\HttpResponseException;

trait ResponseAble
{

    protected function sendError($validator_errors, $message = '', $code = 422){
        throw new HttpResponseException(
            response()->json([
                'result' => [
                    'success' => false,
                    'data'     => []
                ],
                'error' => [
                    'message' => $message,
                    'code'    => ApiResponse::VALIDATION_ERROR
                ],
                'validation_errors' => $validator_errors,
            ])->setStatusCode($code)
        );
    }
}
