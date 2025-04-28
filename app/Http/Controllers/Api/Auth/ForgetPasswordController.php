<?php

namespace App\Http\Controllers\Api\Auth;
use App\Helpers\ApiResponse;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ForgetPasswordController extends Controller
{
    public function forgetPassword(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'phone' => 'required|string|max:11|exists:clients,phone',
        ]);

        if ($validated->fails()) {
            return ApiResponse::sendResponse([$validated->errors()]);
        }
        $data = $validated->validated();
        $client = Client::where('phone', $data['phone'])->first();

        if (! $client) {
            return ApiResponse::sendResponse(404, 'Client not found');
        }

        $pinCode = rand(100000, 999999);
        $client->pin_code = $pinCode;
        $client->save();
        // mail for send code

        return ApiResponse::sendResponse(200, 'Reset code sent successfully', [
            'pin_code' => $pinCode, // just testing until I make the Mail
        ]);

    }
    public function newPassword(Request $request)
    {
        // validate [phone - pin_code - password confirmed]
        $validated = Validator::make($request->all(),[
            'phone' =>'required|string|exists:clients,phone',
            'pin_code' =>'required|string|exists:clients,pin_code',
            'password' =>'required|string|confirmed|min:6',
        ]);
        if ($validated->fails()) {
            return ApiResponse::sendResponse([$validated->errors()]);
        }

        // get client by phone
        $data = $validated->validated();
        $client = Client::where('phone', $data['phone'])->first();
        if(! $client){
            return ApiResponse::sendResponse(401, 'Client not found');
        }
        // check pin_code
        if($client->pin_code != $request->pin_code){
            return ApiResponse::sendResponse(401,'The provided pin code is incorrect');
        }
        // update new password
        $client->update([
            'password' => Hash::make($request->password),
            'pin_code' => null,
        ]);
        // return success
        return ApiResponse::sendResponse(200,'password updated successfully');
    }
}
