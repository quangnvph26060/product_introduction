<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:10',
            'description' => 'required|min:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imagePath = $this->uploadImage($request, 'image', 'uploads/post');
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->status = $request->status;
        $post->image = $imagePath;
        $post->save();
        toastr()->success('Thêm bài viết thành công !');
        return redirect()->route('post.index');
    }


    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.partials.post.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:10',
            'description' => 'required|min:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = Post::findOrFail($id);
        $imagePath = $this->updateImage($request, 'image', 'uploads/post' , $post->image);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->status = $request->status;
        $post->image = empty(!$imagePath) ? $imagePath : $post->image;
        $post->save();
        toastr()->success('Cập nhật bài viết thành công !');
        return redirect()->route('post.index');

    }

    public function destroy($id)
    {
       $post = Post::findOrFail($id);
       $this->deleteImage($post->image);
       $post->delete();
       return response(['status' => 'success' , 'message' => 'Xóa bài viết thành công !']);
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
