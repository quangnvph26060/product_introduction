<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteFeature;
use Illuminate\Http\Request;

class AmdminWebsiteFeatureController extends Controller
{
    public function index()
    {
        $websiteFeatures = WebsiteFeature::all();
        return view('website_features.index', compact('websiteFeatures'));
    }

    public function create()
    {
        return view('website_features.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(WebsiteFeature::rules());

        WebsiteFeature::create($validatedData);

        return redirect()->route('website_features.index');
    }

    public function edit($id)
    {
        $websiteFeature = WebsiteFeature::find($id);
        return view('website_features.edit', compact('websiteFeature'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate(WebsiteFeature::rules($id));

        $websiteFeature = WebsiteFeature::find($id);
        $websiteFeature->update($validatedData);

        return redirect()->route('website_features.index');
    }

    public function destroy($id)
    {
        $websiteFeature = WebsiteFeature::find($id);
        $websiteFeature->delete();

        return redirect()->route('website_features.index');
    }
}
