<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;

use Carbon\Carbon;
use App\Models\Visitor;
use Illuminate\Http\Request;
use function Illuminate\Log\log;

class VisitorController extends Controller
{
    public function checkin()
    {
        return view('checkin'); // Return the view for the form
    }


// checkout search

    public function checkoutSearch(Request $request)
    {
        $query = $request->input('query');

        // Search the database for matching results
        $results = Visitor::where('name', 'LIKE', "%{$query}%")->orWhere('contact_number', 'LIKE', "%{$query}%")->get();

        // Return results as JSON
        return response()->json($results);
    }

    // Check Out
    public function checkout(string $id)
    {
        // dd($id);
        // Find the visitor by ID
        $visitor = Visitor::findOrFail($id);

        // dd($visitor);
        $currentTime = Carbon::now()->format('H:i:s');
        // $date = new DateTime($currentTime, new DateTimeZone('Asia/Dhaka'));
        $visitor->update([
            'checkout' => $currentTime
        ]);
        toastr()->success('Checkout complete!');
        return redirect()->back()->with('success', 'Guest check-in recorded successfully!');
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
        toastr()->success('Checkin successfully!');
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
        $visitor->visitor_number = $request->visitor_number;

        // Save the changes
        $visitor->save();
        toastr()->success('Data has been updated successfully!');
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
        toastr()->success('Data has been Deleted successfully!');
        return redirect()->route('dashboard');

    }



    public function edit(Request $request)
    {
        // Process the request data
        $data = Visitor::find($request->id);

        // Return a response (could be JSON or any other format)
        return response()->json(['message' => 'Data received', 'data' => $data]);
    }


    // Search name
    public function search(Request $request)
    {
        $query = $request->input('query');

        $visitors = Visitor::where('name', 'LIKE', "%{$query}%")->get(); // Adjust 'column_name' and 'YourModel'

        return response()->json($visitors);
    }

}
