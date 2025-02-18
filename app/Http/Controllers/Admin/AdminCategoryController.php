<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\ImageUploadTrait;

class AdminCategoryController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        $listCategories = Category::latest()->get();
        return view('admin.partials.categories.index', compact('listCategories'));
    }

    public function create()
    {
        $categorys = Category::whereNull('parent_id')->get();
        return view('admin.partials.categories.create', compact('categorys'));
    }

    public function store(CategoryRequest $request)
    {

        $imagePath = $this->uploadImage($request, 'image', 'uploads/category');
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->image = $imagePath;
        $category->description = $request->description;
        $category->parent_id  = $request->parent_id ;
        $category->tags  = $request->tags ;
        $category->title_seo = $request->title_seo;
        $category->description_seo = $request->description_seo;
        $category->keyword_seo = $request->keyword_seo;
        $category->save();

        toastr()->success('Thêm sản phẩm thành công !');
        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $categorys = Category::whereNull('parent_id')->get();
        return view('admin.partials.categories.create', compact('category', 'categorys'));
    }

    public function update(CategoryRequest $request, $id)
    {
        // dd($request->all());
        $category = Category::findOrFail($id);
        $imagePath = $this->updateImage($request, 'image', 'uploads/category', $category->image);
        $category->image = empty(!$imagePath) ? $imagePath : $category->image;
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->tags = $request->tags;
        $category->parent_id  = $request->parent_id ;
        $category->description = $request->description;
        $category->title_seo = $request->title_seo;
        $category->description_seo = $request->description_seo;
        $category->keyword_seo = $request->keyword_seo;
        $category->save();
        toastr()->success('Cập nhật sản phẩm thành công !');
        return redirect()->back();
    }

    // ProductController.php
    public function destroy(Request $request, $id)
    {
        try {
            $category = Category::findOrFail($id); // Tìm sản phẩm theo ID
            $category->delete(); // Xóa sản phẩm

            return response()->json([
                'success' => 'Sản phẩm đã được xóa thành công.',

            ]);
        } catch (\Exception $e) {
            // Nếu có lỗi, trả về thông báo lỗi
            return response()->json([
                'error' => 'Đã có lỗi xảy ra khi xóa sản phẩm.'
            ], 500);
        }
    }

}
