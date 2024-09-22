<?php

namespace App\Http\Controllers;

use App\Models\ResidentInfo;
use Illuminate\Http\Request;

class ResidentInfoController extends Controller
{

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'nid' => 'required|string|max:20',
            'occupation' => 'nullable|string|max:255',
            'family_member' => 'nullable|string|max:255',
            'relative_name' => 'nullable|string|max:255',
            'relative_number' => 'nullable|string|max:15',
        ]);

        ResidentInfo::create($request->all());

        toastr()->success('Created successfully!');
        return redirect()->back()->with('success', 'Resident created successfully!');
    }

}
