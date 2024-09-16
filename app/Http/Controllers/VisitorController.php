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
            'checkout'=>'nullable|string|max:20',
            'visitor_number'=>'required|string|max:20',
        ]);

        // dd($request);

        Visitor::create($request->all());

        return redirect()->back()->with('success', 'Guest check-in recorded successfully!');
    }



    public function update(Request $request)
    {
        // dd($request->all());
            // Validate the incoming data
        $request->validate([
            'visit_date' => 'nullable|string|max:255',
            'name' => 'required|string|max:120',
            'contact_number'=> 'required|string|max:20',
            'purposse_of_visit'=>'required|string|max:120',
            'appartment'=>'required|string|max:20',
            'unit_number'=>'required|string|max:20',
            'checkin'=>'required|string|max:20',
            'checkout'=>'nullable|string|max:20',
            'visitor_number'=>'required|string|max:20',
        ]);

        // Find the visitor by ID
        $visitor = Visitor::findOrFail($request->visitiorId);
        // dd($visitor);

        // Update the name field
        $visitor->name = $request->name;
        $visitor->contact_number = $request->contact_number;
        $visitor->visit_date = $request->visit_date;
        $visitor->purposse_of_visit = $request->purposse_of_visit;
        $visitor->appartment = $request->appartment;
        $visitor->unit_number = $request->unit_number;
        $visitor->checkin = $request->checkin;
        $visitor->checkout = $request->checkout;

        // Save the changes
        $visitor->save();

        // Return a success response
        return response()->json([
            'message' => 'Visitor name updated successfully!',
            'data' => $visitor,
        ]);
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
