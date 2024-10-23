<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class AdminNewCategoryController extends Controller
{
    public function index()
    {
        $newsCategories = NewsCategory::all();
        return view('admin.partials.news_categories.index', compact('newsCategories'));
    }
    public function create()
    {
        return view('admin.partials.news_categories.create');
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:3|max:20|unique:news_categories,name'
            ],
            __('request.messages'),
            ['name' => 'Tên danh mục tin tức']
        );
        $newCategory = new NewsCategory();
        $newCategory->name = $request->name;
        $newCategory->save();
        toastr()->success('Thêm danh mục tin tức thành công !');
        return redirect()->route('news_categories.index');
    }
    public function edit($id)
    {
        $newCategory = NewsCategory::findOrFail($id);
        return view('admin.partials.news_categories.edit', compact('newCategory'));
    }
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|min:3|max:20'
            ],
            __('request.messages'),
            ['name' => 'Tên danh mục tin tức']
        );
        $newCategory = NewsCategory::findOrFail($id);
        $newCategory->name = $request->name;
        $newCategory->save();
        toastr()->success('Cập nhật danh mục tin tức thành công !');
        return redirect()->route('news_categories.index');
    }
    public function destroy($id)
    {
        $newCategory = NewsCategory::findOrFail($id);
        if ($newCategory->news->count() > 0) {
            return response(['status' => 'error', 'message' => 'Mục này chứa các tin tức phụ thuộc, bạn phải xóa các tin tức trước']);
        }
        $newCategory->delete();
        return response(['status' => 'success', 'Xóa thành công']);
    }
}
