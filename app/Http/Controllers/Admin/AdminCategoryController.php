<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $listCategories = Category::all();
        return view('admin.partials.categories.index', compact('listCategories'));
    }

    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('admin.partials.categories.create', compact('categories'));
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

        toastr()->success('Danh mục đã thêm thành công !');
        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category)
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('admin.partials.categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'parent_id' => 'nullable|exists:categories,id'
        ]);
        $category->update($request->all());

        toastr()->success('Danh mục cập nhật thành công !');
        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        // $category->product->each(function ($item) {
        //     $item->images->each(function ($image) {
        //         $this->deleteImage($image->image_path);
        //         $image->delete();
        //     });
        //     $this->deleteImage($item->main_image);
        //     $item->delete();
        // });
        // $category->delete();
        // toastr()->success('Danh mục xóa thành công !');
        // return redirect()->route('admin.categories.index');
        $category = Category::findOrFail($id);
        if ($category->children->count() > 0) {
            return response(['status' => 'error', 'message' => 'Mục này chứa các mục con, nếu muốn xóa bạn phải xóa mục con trước']);
        }
        if ($category->product->count() > 0) {
            return response(['status' => 'error', 'message' => 'Mục này chứa các sản phẩm , bạn cần xóa các sản phẩm thuộc danh mục này trước']);
        }
        $category->delete();
        return response(['status' => 'success', 'Xóa thành công']);
    }
}
