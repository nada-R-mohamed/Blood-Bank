<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::with('governorate')->latest()->paginate(10);
        return view('dashboard.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $governorates = Governorate::all();
        return view('dashboard.cities.create',compact('governorates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|regex:/[a-zA-Z]/',
            'governorate_id' => 'required|exists:governorates,id',
        ]);

        City::create($validated);
        return redirect()->route('cities.index')->with('success', 'City created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        return view('dashboard.cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        return view('dashboard.city.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|regex:/[a-zA-Z]/',
            'governorate_id' => 'required|exists:governorates,id',
        ]);

        $city->update($validated);

        return redirect()->route('cities.index')->with('info', 'City updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index')->with('success', 'City deleted successfully.');
    }
}
