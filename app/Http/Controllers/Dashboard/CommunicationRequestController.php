<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CommunicationRequest;
use Illuminate\Http\Request;

class CommunicationRequestController extends Controller
{
    public function index(Request $request)
    {
        $requests = CommunicationRequest::query();

        if ($request->filled('status')) {
            $requests = $request->status === 'done' ? $requests->done() : $requests->pending();
        }

        if ($request->filled('search')) {
            $requests = $requests->search($request->search);
        }

        $requests = $requests->with('client')->get();

        return view('dashboard.communication-requests.index', compact('requests'));
    }

    public function destroy(CommunicationRequest $communicationRequest)
    {
        $communicationRequest->delete();
        return back()->with('success', 'Communication Request deleted successfully.');
    }
}
