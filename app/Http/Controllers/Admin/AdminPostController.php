<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        $posts = Post::all();
        return view('admin.partials.post.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.partials.post.create');
    }

    public function store(PostRequest $request)
    {
        // dd($request->all());
        $imagePath = $this->uploadImage($request, 'image', 'uploads/post');
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->slug = Str::slug($request->title, '-');
        $post->status = $request->status;
        $post->tags = $request->tags;
        $post->image = $imagePath;
        $post->title_seo = $request->title_seo;
        $post->description_seo = $request->description_seo;
        $post->keyword_seo = $request->keyword_seo;
        $post->save();
        toastr()->success('Thêm bài viết thành công !');
        return redirect()->route('post.index');
    }


    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.partials.post.create', compact('post'));
    }

    public function update(PostRequest $request, $id)
    {

        $post = Post::findOrFail($id);
        $imagePath = $this->updateImage($request, 'image', 'uploads/post' , $post->image);
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->description = $request->description;
        $post->status = $request->status;
        $post->tags = $request->tags;
        $post->image = empty(!$imagePath) ? $imagePath : $post->image;
        $post->title_seo = $request->title_seo;
        $post->description_seo = $request->description_seo;
        $post->keyword_seo = $request->keyword_seo;
        $post->save();
        toastr()->success('Cập nhật bài viết thành công !');
        return redirect()->route('post.index');

    }

    public function destroy($id)
    {
       $post = Post::findOrFail($id);
       $this->deleteImage($post->image);
       $post->delete();
       toastr()->success('Xóa bài viết thành công !');
       return redirect()->back();
    }

    public function changeStatus(Request $request){
        $post = Post::find($request->post_id);
        if (!$post) {
            return response()->json(['error' => 'Không tìm thấy sản phẩm!']);
        }
        $post->status = $request->status;
        $post->save();
        return response()->json(['success' => 'Cập nhật trạng thái thành công!']);
    }

}
