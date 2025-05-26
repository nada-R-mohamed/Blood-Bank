<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $clients = Client::query();

        if ($request->filled('status')) {
            $clients = $request->status === 'active' ? $clients->active() : $clients->inactive();
        }

        if ($request->filled('search')) {
            $clients = $clients->search($request->search);
        }


        $clients = $clients->with('city')->get();
        $cities = City::all();

        return view('dashboard.clients.index', compact('clients','cities'));
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return back()->with('success', 'Client deleted successfully.');
    }

    public function show(Client $client)
    {
        return view('dashboard.clients.show', compact('client'));
    }

    public function toggleStatus(Client $client)
    {
        $client->status = $client->status === 'active' ? 'inactive' : 'active';
        $client->save();

        return back()->with('success', 'Client status updated.');
    }
}
