<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Governorate;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $governorates = Governorate::latest()->paginate(10);
        return view('dashboard.governorates.index', compact('governorates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.governorates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated =$request->validate([
            'name' => 'required|string|unique:governorates|max:255|regex:/[a-zA-Z]/',
        ]);

        Governorate::create($validated);
        return redirect()->route('governorates.index')->with('success', 'governorate created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Governorate $governorate)
    {

        return view('dashboard.governorates.show', compact('governorate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Governorate $governorate)
    {
        return view('dashboard.governorates.edit', compact('governorate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Governorate $governorate)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:governorates,name,' . $governorate->id,
        ]);

        $governorate->update($validated);

        return redirect()->route('governorates.index')->with('info', 'Governorate updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Governorate $governorate)
    {
        $governorate->delete();
        return redirect()->route('governorates.index')->with('success', 'Governorate deleted successfully.');
    }
}
