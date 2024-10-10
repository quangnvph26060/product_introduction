<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    public function index()
    {
        $settings = GeneralSetting::first();
        return view('settings.index', compact('settings'));
    }

    public function create()
    {
        return view('settings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        GeneralSetting::create($request->all());

        return redirect()->route('settings.index')->with('success', 'Cấu hình đã được lưu thành công');
    }

    public function edit(GeneralSetting $setting)
    {
        return view('settings.edit', compact('setting'));
    }

    public function update(Request $request, GeneralSetting $setting)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $setting->update($request->all());

        return redirect()->route('settings.index')->with('success', 'Cập nhật cấu hình thành công');
    }

    public function destroy(GeneralSetting $setting)
    {
        $setting->delete();

        return redirect()->route('settings.index')->with('success', 'Cấu hình đã được xoá thành công');
    }
}
