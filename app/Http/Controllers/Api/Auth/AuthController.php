<?php

namespace App\Http\Controllers\Api\Auth;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request) : JsonResponse
    {

        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:clients',
                'password' => 'required|string|min:8|confirmed',
                'phone' => 'required|string|max:11|unique:clients',
                'blood_type_id' => 'required|exists:blood_types,id',
                'city_id' => 'required|integer|exists:cities,id',
                'last_donation_date' => 'nullable|date',
            ]);

            if ($validator->fails()) {
                return ApiResponse::sendResponse(422, 'Validation Error', $validator->errors());
            }

            $validated = $validator->validated();
            $validated['password'] = Hash::make($validated['password']);

            $client = Client::create($validated);
            $token = $client->createToken('mobile')->plainTextToken;

            return ApiResponse::sendResponse(201, 'Registered successfully', [
                'client' => $client,
                'token' => $token,
            ]);

        } catch (Exception $e) {
            return ApiResponse::sendResponse(500, 'Something went wrong');
        }

    }
    public function login(Request $request) : JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'phone' => 'required|string|max:11|exists:clients,phone',
                'password' => 'required|string|min:8',
            ]);

            if ($validator->fails()) {
                return ApiResponse::sendResponse(422, 'Validation Error', $validator->errors());
            }

            $validated = $validator->validated();
            $client = Client::where('phone', $validated['phone'])->first();

            if (! $client || ! Hash::check($validated['password'], $client->password)) {
                return ApiResponse::sendResponse(401, 'Invalid credentials');
            }

            $token = $client->createToken('mobile')->plainTextToken;

            return ApiResponse::sendResponse(200, 'Logged in successfully', [
                'client' => $client,
                'token' => $token,
            ]);

        } catch (Exception $e) {
            return ApiResponse::sendResponse(500, 'Something went wrong');
        }
    }

    public function logout(Request $request) : JsonResponse
    {
        try {
            $request->user()->currentAccessToken()->delete();

            return ApiResponse::sendResponse(200, 'Logged out successfully');

        } catch (Exception $e) {
            return ApiResponse::sendResponse(500, 'Something went wrong');
        }
    }
}
