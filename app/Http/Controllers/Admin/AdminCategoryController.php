<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(20);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('admin.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'parent_id' => 'nullable|exists:categories,id'
        ], [
            'name.required' => 'Tên danh mục không được để trống',
        ]);

        $category = new Category;
        $category->name = $request->input('name');
        $category->parent_id = $request->input('parent_id');
        $category->save();

        $notification = ['type' => 'success', 'message' => 'Danh mục đã được thêm thành công'];
        return redirect()->route('admin.categories.index')->with('notification', $notification);
    }

    public function edit(Category $category)
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'parent_id' => 'nullable|exists:categories,id'
        ]);
        $category->update($request->all());

        $notification = ['type' => 'success', 'message' => 'Danh mục đã được cập nhật thành công'];
        return redirect()->route('admin.categories.index')->with('notification', $notification);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        $notification = ['type' => 'success', 'message' => 'Danh mục đã được xóa thành công'];
        return redirect()->route('admin.categories.index')->with('notification', $notification);
    }
}
