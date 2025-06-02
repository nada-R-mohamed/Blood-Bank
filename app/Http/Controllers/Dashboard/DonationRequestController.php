<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\City;
use App\Models\DonationRequest;
use Illuminate\Http\Request;

class DonationRequestController extends Controller
{
    public function index(Request $request)
    {
        $donations = DonationRequest::query();

        if ($request->filled('search')) {
            $donations = $donations->search($request->search);
        }

        if ($request->filled('blood_type_id')) {
            $donations = $donations->bloodType($request->blood_type_id);
        }

        if ($request->filled('city_id')) {
            $donations = $donations->city($request->city_id);
        }

        $donations = $donations->with(['client', 'bloodType', 'city'])->get();
        $bloodTypes = BloodType::all();
        $cities = City::all();

        return view('dashboard.donation-requests.index', compact('donations', 'bloodTypes', 'cities'));
    }

    public function destroy(DonationRequest $donationRequest)
    {
        $donationRequest->delete();
        return back()->with('success', 'Donation request deleted successfully.');
    }

    public function show(DonationRequest $donationRequest)
    {
        return view('dashboard.donation-requests.show', compact('donationRequest'));
    }
}
