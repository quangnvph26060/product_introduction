<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Website;
use Illuminate\Http\Request;

class AdminWebsiteController extends Controller
{
    public function index()
    {
        $websites = Website::all();
        return view('websites.index', compact('websites'));
    }

    public function create()
    {
        return view('websites.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $data['image'] = $request->file('image')->store('images', 'public');

        Website::create($data);

        return redirect()->route('websites.index')->with('success', 'Website created successfully');
    }

    public function edit(Website $website)
    {
        return view('websites.edit', compact('website'));
    }

    public function update(Request $request, Website $website)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $website->update($data);

        return redirect()->route('websites.index')->with('success', 'Website updated successfully');
    }

    public function destroy(Website $website)
    {
        $website->delete();

        return redirect()->route('websites.index')->with('success', 'Website deleted successfully');
    }  
}
