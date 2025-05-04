<?php

namespace App\Http\Controllers\Api\Auth;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Exception;

class ForgetPasswordController extends Controller
{
    public function forgetPassword(Request $request) : JsonResponse
    {
        try {
            $validated = Validator::make($request->all(), [
                'phone' => 'required|string|max:11|exists:clients,phone',
            ]);

            if ($validated->fails()) {
                return ApiResponse::sendResponse(422, 'Validation Error', $validated->errors());
            }

            $data = $validated->validated();
            $client = Client::where('phone', $data['phone'])->first();

            $pinCode = rand(100000, 999999);
            $client->pin_code = $pinCode;
            $client->save();

            // TODO: Send pin code via email

            return ApiResponse::sendResponse(200, 'Reset code sent successfully', [
                'pin_code' => $pinCode, // مؤقتاً للتيست
            ]);
        } catch (Exception $e) {
            return ApiResponse::sendResponse(500, 'Something went wrong');
        }
    }

    public function newPassword(Request $request) : JsonResponse
    {
        try {
            $validated = Validator::make($request->all(), [
                'phone' => 'required|string|exists:clients,phone',
                'pin_code' => 'required|string|exists:clients,pin_code',
                'password' => 'required|string|confirmed|min:6',
            ]);

            if ($validated->fails()) {
                return ApiResponse::sendResponse(422, 'Validation Error', $validated->errors());
            }

            $data = $validated->validated();
            $client = Client::where('phone', $data['phone'])->first();


            if ($client->pin_code != $data['pin_code']) {
                return ApiResponse::sendResponse(401, 'The provided pin code is incorrect');
            }

            $client->update([
                'password' => Hash::make($data['password']),
                'pin_code' => null,
            ]);

            return ApiResponse::sendResponse(200, 'Password updated successfully');

        } catch (Exception $e) {
            return ApiResponse::sendResponse(500, 'Something went wrong');
        }
    }
}
