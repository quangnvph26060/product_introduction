<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index()
    {
        $categories = Post::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        // Logic to store the category
        $notification = ['type' => 'success', 'message' => 'Danh mục đã được tạo thành công'];
        return redirect()->route('admin.categories.index')->with('notification', $notification);
    }

    public function edit($id)
    {
        $category = Post::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // Logic to update the category based on $id
        $notification = ['type' => 'success', 'message' => 'Danh mục đã được cập nhật thành công'];
        return redirect()->route('admin.categories.index')->with('notification', $notification);
    }

    public function destroy($id)
    {
        // Logic to delete the category based on $id
        $notification = ['type' => 'success', 'message' => 'Danh mục đã được xóa thành công'];
        return redirect()->route('admin.categories.index')->with('notification', $notification);
    }
}
