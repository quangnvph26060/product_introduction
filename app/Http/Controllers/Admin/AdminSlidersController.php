<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class AdminSlidersController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        $slider = Slider::orderBy('id', 'desc')->get();
        return view('admin.partials.slider.index', compact('slider'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $imagePaths = $this->uploadMultiImage($request, 'image', 'uploads/slider');
        foreach ($imagePaths as $path) {
            $slider = new Slider();
            $slider->title = "";
            $slider->description = "";
            $slider->status = "published";
            $slider->image = $path;
            $slider->save();
        }
        toastr()->success('Thêm ảnh slider banner thành công');
        return redirect()->back();
    }
    public function destroy(string $id)
    {
        
    }
}
