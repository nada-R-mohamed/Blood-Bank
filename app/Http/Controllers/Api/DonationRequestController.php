<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DonationRequest;
use App\Http\Requests\Api\CreateDonationRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Helpers\ApiResponse;
use Illuminate\Support\Facades\Validator;

class DonationRequestController extends Controller
{
    public function allDonationsRequests():JsonResponse
    {
        $donations = DonationRequest::all();

        return ApiResponse::sendResponse(200, 'success', compact('donations'));
    }
    public function donationRequest(Request $request):JsonResponse
    {
        $donationRequest = DonationRequest::find($request->query('id'));

        return ApiResponse::sendResponse(200, 'success', compact('donationRequest'));
    }
    public function createDonationRequest(CreateDonationRequest $request) :JsonResponse
    {


        if ($validator->fails()) {
            return ApiResponse::sendResponse(422, [$validator->errors()], []);
        }
        $donationRequest = $request->user('api')->donationRequests()->create($request->all());

        return ApiResponse::sendResponse(200, 'success', []);
    }

}
