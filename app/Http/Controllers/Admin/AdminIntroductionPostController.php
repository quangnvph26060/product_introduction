<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\IntroductionPostCreateRequest;
use App\Http\Requests\IntroductionPostUpdateRequest;
use App\Models\IntroductionCategory;
use App\Models\IntroductionPost;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminIntroductionPostController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        $introductionPosts = IntroductionPost::orderBy('id', 'desc')->get();
        return view('admin.partials.introduction_posts.index', compact('introductionPosts'));
    }
    public function create()
    {
        $introductionCategories = IntroductionCategory::orderBy('id', 'desc')->get();
        return view('admin.partials.introduction_posts.create', compact('introductionCategories'));
    }
    public function store(IntroductionPostCreateRequest $request)
    {
        $imagePath = $this->uploadImage($request, 'image', 'uploads/introduction_posts');
        $introductionPost = new IntroductionPost();
        $introductionPost->title = $request->title;
        $introductionPost->content = $request->content;
        $introductionPost->status = $request->status;
        $introductionPost->slug = Str::slug($request->title, '-');
        $introductionPost->introduction_category_id	 = $request->introduction_category_id	;
        $introductionPost->image = $imagePath;
        $introductionPost->save();
        toastr()->success('Thêm bài viết giới thiệu thành công !');
        return redirect()->route('introduction_posts.index');
    }
    public function edit($id)
    {
        $introductionCategories = IntroductionCategory::orderBy('id', 'desc')->get();
        $introductionPost = IntroductionPost::findOrFail($id);
        return view('admin.partials.introduction_posts.create', compact('introductionCategories', 'introductionPost'));
    }
    public function update(IntroductionPostUpdateRequest $request, $id)
    {
        // dd(1);

        $introductionPost = IntroductionPost::findOrFail($id);
        $imagePath = $this->updateImage($request, 'image', 'uploads/introduction_posts', $introductionPost->image);
        $introductionPost->image = empty(!$imagePath) ? $imagePath : $introductionPost->image;
        $introductionPost->title = $request->title;
        $introductionPost->content = $request->content;
        $introductionPost->slug = $request->slug ?? Str::slug($request->title, '-');
        $introductionPost->status = $request->status;
        $introductionPost->introduction_category_id	 = $request->introduction_category_id	;
        $introductionPost->save();
        toastr()->success('Cập nhật bài viết giới thiệu thành công !');
        return redirect()->route('introduction_posts.index');
    }
    public function destroy($id)
    {
        $introductionPost = IntroductionPost::findOrFail($id);
        $this->deleteImage($introductionPost->image);
        $introductionPost->delete();
        return response(['status' => 'success', 'message' => 'Xóa bài viết giới thiệu thành công !']);
    }

    public function changeStatus(Request $request)
    {
        $introductionPost = IntroductionPost::find($request->introduction_post_id);
        if (!$introductionPost) {
            return response()->json(['error' => 'Không tìm thấy bài viết giới thiệu!']);
        }
        $introductionPost->status = $request->status;
        $introductionPost->save();
        return response()->json(['success' => 'Cập nhật trạng thái thành công!']);
    }
}
