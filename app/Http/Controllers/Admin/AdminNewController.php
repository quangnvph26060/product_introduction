<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class AdminNewController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::with('newsCategory')->get();
        return view('admin.partials.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $newsCategories = NewsCategory::all();
        return view('admin.partials.news.create', compact('newsCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|min:5|max:100',
                'news_category_id' => 'required',
                'description' => 'required|min:20',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            __('request.messages'),
            [
                'title' => 'Tiêu đề danh mục tin tức',
                'news_category_id' => 'Danh mục tin tức',
                'description' => 'Mô tả tin tức',
                'image' => 'Hình ảnh'
            ]
        );
        $imagePath = $this->uploadImage($request, 'image', 'uploads/news');
        $new = new News();
        $new->title = $request->title;
        $new->description = $request->description;
        $new->status = $request->status;
        $new->news_category_id = $request->news_category_id;
        $new->image = $imagePath;
        $new->save();
        toastr()->success('Đã thêm tin tức thành công !');
        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $newsCategories = NewsCategory::all();
        $new = News::findOrFail($id);
        return view('admin.partials.news.create', compact('newsCategories', 'new'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'required|min:5|max:100',
                'news_category_id' => 'required',
                'description' => 'required|min:20',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            __('request.messages'),
            [
                'title' => 'Tiêu đề danh mục tin tức',
                'news_category_id' => 'Danh mục tin tức',
                'description' => 'Mô tả tin tức',
                'image' => 'Hình ảnh'
            ]
        );
        $new = News::findOrFail($id);
        $imagePath = $this->updateImage($request, 'image', 'uploads/news', $new->image);
        $new->title = $request->title;
        $new->status = $request->status;
        $new->image = empty(!$imagePath) ? $imagePath : $new->image;
        $new->description = $request->description;
        $new->news_category_id = $request->news_category_id;
        $new->save();
        toastr()->success('Cập nhật tin tức thành công !');
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $new = News::findOrFail($id);
        $this->deleteImage($new->image);
        $new->delete();
        return response(['status' => 'success', 'message' => 'Xóa tin tức thành công !']);
    }
    public function changeStatus(Request $request)
    {
        $new = News::find($request->new_id);
        if (!$new) {
            return response()->json(['error' => 'Không tìm thấy tin tức này!']);
        }
        $new->status = $request->status;
        $new->save();
        return response()->json(['success' => 'Cập nhật trạng thái thành công!']);
    }
}
