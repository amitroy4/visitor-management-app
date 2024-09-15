<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function checkin()
    {
        return view('checkin'); // Return the view for the form
    }

    // Store form data
    public function store(Request $request)
    {
        $request->validate([
            'visit_date' => 'nullable|string|max:255',
            'name' => 'required|string|max:120',
            'contact_number'=> 'required|string|max:20',
            'purposse_of_visit'=>'required|string|max:120',
            'appartment'=>'required|string|max:20',
            'unit_number'=>'required|string|max:20',
            'checkin'=>'required|string|max:20',
            'checkout'=>'nullable|time|max:20',
            'visitor_number'=>'required|string|max:20',
        ]);

        // dd($request);

        Visitor::create($request->all());

        return redirect()->back()->with('success', 'Guest check-in recorded successfully!');
    }

    public function destroy(string $id)
    {
        $visitor= Visitor::find($id);

        $visitor->delete();
        return redirect()->route('dashboard');

    }
    public function edit(Request $request)
    {
        // Process the request data
        $data = Visitor::find($request->id);

        // Return a response (could be JSON or any other format)
        return response()->json(['message' => 'Data received', 'data' => $data]);
    }

}
