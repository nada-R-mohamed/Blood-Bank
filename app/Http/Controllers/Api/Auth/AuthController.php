<?php

namespace App\Http\Controllers\Api\Auth;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $validated =$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:11|unique:clients',
            'blood_type_id' => 'required|exists:blood_types,id',
            'city_id' => 'required|int|exists:cities,id',
            'last_donation_date' => 'nullable|date',
        ]);


        $validated['password'] = Hash::make($validated['password']);
        $client = Client::create($validated);
        $token = $client->createToken('mobile')->plainTextToken;

        return ApiResponse::sendResponse(201, 'Registered successfully', [
            'client' => $client,
            'token' => $token,
        ]);
    }
    public function login(Request $request)
    {
        $validated = $request->validate([
            'phone' => 'required|string|max:11|exists:clients,phone',
            'password' => 'required|string|min:8',
        ]);

        $client = Client::where('phone', $validated['phone'])->first();

        if (! $client || ! Hash::check($validated['password'], $client->password)) {
            throw ValidationException::withMessages([
                'phone' => ['The provided credentials are incorrect.'],
            ]);
        }
        //remember me
//        $token = $client->createToken('mobile', [], $validated['remember_me'] ? now()->addMonths(6) : now()->addHours(1))->plainTextToken;


        $token = $client->createToken('mobile')->plainTextToken;

        return ApiResponse::sendResponse(200, 'Logged in successfully', [
            'client' => $client,
            'token' => $token,
        ]);
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return ApiResponse::sendResponse(200, 'Logged out successfully');
    }

}
