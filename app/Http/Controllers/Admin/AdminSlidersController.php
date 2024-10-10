<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class AdminSlidersController extends Controller
{
    public function index()
    {
        $categories = Slider::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $category = Slider::create($validatedData);

        $notification = ['type' => 'success', 'message' => 'Danh mục đã được tạo thành công'];
        return redirect()->route('admin.categories.index')->with('notification', $notification);
    }

    public function edit(Slider $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Slider $category)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $category->update($validatedData);

        $notification = ['type' => 'success', 'message' => 'Danh mục đã được cập nhật thành công'];
        return redirect()->route('admin.categories.index')->with('notification', $notification);
    }

    public function destroy(Slider $category)
    {
        $category->delete();

        $notification = ['type' => 'success', 'message' => 'Danh mục đã được xóa thành công'];
        return redirect()->route('admin.categories.index')->with('notification', $notification);
    }
}
