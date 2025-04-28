<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class ApiResponse
{

    static function sendResponse($code = 200, $message = null, $data = null) : JsonResponse
    {
        $response = [
          'status' => $code,
            'message' => $message,
            'data' => $data,
        ];
        return response()->json($response, $code);
    }
}
