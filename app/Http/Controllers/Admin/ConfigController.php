<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\Slider;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConfigController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        $title = 'Thông tin cửa hàng';
        $config = Config::first();
        return view('admin.partials.config.index', compact('config', 'title'));
    }

    public function slider()
    {
        $title = 'Thông tin cửa hàng';
        $images = Slider::get();
        return view('admin.partials.config.slider', compact('images', 'title'));
    }

    public function update(Request $request)
    {
        $data = $request->all();

        $config = Config::first();
        if ($config) {
            $data['path'] = $this->updateImage($request, 'path', 'uploads/path', $config->path);

            $data['icon'] = $this->updateImage($request, 'icon', 'uploads/icon', $config->icon);
            $config->update($data);
        } else {

            $data['path'] = $this->uploadImage($request, 'path', 'uploads/path');

            $data['icon'] = $this->uploadImage($request, 'icon', 'uploads/icon');
            Config::create($data);
        }

        return redirect()->route('config.index')->with('success', 'Cập nhật thông tin thành công');
    }


    public function updateSlider(Request $request)
    {
        // Đảm bảo oldImages luôn là một mảng
        $oldImages = $request->input('old') ?? [];

        // Lấy danh sách id của tất cả ảnh trong Slider
        $productImages = Slider::pluck('id')->toArray();

        // Xác định ảnh cần giữ lại và ảnh cần xóa
        $imagesToKeep = array_intersect($oldImages, $productImages);
        $imagesToDelete = array_diff($productImages, $imagesToKeep);

        // Xóa các ảnh không cần thiết
        foreach ($imagesToDelete as $imageId) {
            $image = Slider::find($imageId);
            if ($image) {
                // Xóa file ảnh trong thư mục lưu trữ
                Storage::delete($image->image);
                // Xóa ảnh khỏi cơ sở dữ liệu
                $image->delete();
            }
        }

        // Kiểm tra nếu có ảnh mới
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $this->uploadFileImage($image, 'sliders');

                // dd($imagePath);
                if ($imagePath) {
                    // Lưu ảnh mới vào cơ sở dữ liệu
                    Slider::create([
                        'image' =>  $imagePath,
                        'status' => 'published'
                    ]);
                }
            }
        }

        // toastr()->success('Thêm sản phẩm thành công !');
        return redirect()->back();
    }
}
