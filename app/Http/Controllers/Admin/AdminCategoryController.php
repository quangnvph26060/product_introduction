<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->input('name');
        $category->parent_id = $request->input('parent_id');
        $category->save();

        $notification = ['type' => 'success', 'message' => 'Danh mục đã được thêm thành công'];
        return redirect()->route('admin.categories.index')->with('notification', $notification);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->parent_id = $request->input('parent_id');
        $category->save();

        $notification = ['type' => 'success', 'message' => 'Danh mục đã được cập nhật thành công'];
        return redirect()->route('admin.categories.index')->with('notification', $notification);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        $notification = ['type' => 'success', 'message' => 'Danh mục đã được xóa thành công'];
        return redirect()->route('admin.categories.index')->with('notification', $notification);
    }
}
