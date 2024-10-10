<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;

class AdminBusinessesController extends Controller
{
    public function index()
    {
        $businesses = Business::all();
        return view('admin.businesses.index', compact('businesses'));
    }

    public function create()
    {
        return view('admin.businesses.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
        ]);

        Business::create($validatedData);

        return redirect('/admin/businesses')->with('success', 'Business created successfully');
    }

    public function edit(Business $business)
    {
        return view('admin.businesses.edit', compact('business'));
    }

    public function update(Request $request, Business $business)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
        ]);

        $business->update($validatedData);

        return redirect('/admin/businesses')->with('success', 'Business updated successfully');
    }

    public function destroy(Business $business)
    {
        $business->delete();

        return redirect('/admin/businesses')->with('success', 'Business deleted successfully');
    }
}
