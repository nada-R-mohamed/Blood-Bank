<?php

namespace App\Http\Controllers\Api;
use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\Category;
use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function governorates(Request $request ) :JsonResponse
    {
        $governorates = Governorate::paginate($request->get('per_page', 10));
        return ApiResponse::sendResponse(200, 'success', compact('governorates'));

    }
    public function cities(Request $request) :JsonResponse
    {
        $cities = City::paginate($request->get('per_page', 10));
        return ApiResponse::sendResponse(200, 'success', compact('cities'));
    }
    public function categories(Request $request) : JsonResponse
    {

        $categories = Category::paginate($request->get('per_page', 10));
        return ApiResponse::sendResponse(200, 'success', compact('categories'));
    }
    public function bloodTypes() :JsonResponse
    {

        $bloodTypes = BloodType::all();
        return ApiResponse::sendResponse(200, 'success', compact('bloodTypes'));
    }
}
