<?php

namespace App\Http\Controllers\Api;
use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function getProfile()
    {
        $clientProfile = Auth::guard('api')->user();
        return ApiResponse::sendResponse(200,compact('clientProfile'));
    }
    public function updateProfile(Request $request)
    {

        $clientProfile = Auth::guard('api')->user();

        $validated = Validator::make($request->all(),[
            'name' => 'sometimes|string|min:3|max:100',
            'email' => "sometimes|email|unique:clients,email,$clientProfile->id",
            'date_of_birth' => 'sometimes|date',
            'blood_type_id' => 'sometimes|integer|exists:blood_types,id',
            'phone' => 'sometimes|string|max:11|unique:clients,phone,$clientProfile->id',
            'password' => 'sometimes|required|string|min:8|confirmed',
            'last_donation_date' => 'sometimes|nullable|date',
            'city_id' => 'sometimes|integer|exists:cities,id',
        ]);

        if ($validated->fails()) {
            return ApiResponse::sendResponse(400, $validated->errors());
        }

        $clientProfile->update($request->only([
            'name',
            'email',
            'date_of_birth',
            'blood_type_id',
            'phone',
            'password',
            'last_donation_date',
            'city_id',
        ]));

        if ($request->has('password')) {
            $clientProfile->password = Hash::make($request->password);
            $clientProfile->save();
        }

        return ApiResponse::sendResponse(200, 'Profile updated successfully');

    }

}
