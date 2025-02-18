<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait ImageUploadTrait
{
    public function uploadImage(Request $request, $inputName, $path)
    {
        if (!$request->hasFile($inputName)) {
            return null;
        }

        $files = is_array($request->{$inputName}) ? $request->{$inputName} : [$request->{$inputName}];

        $imagePaths = [];

        foreach ($files as $image) {
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_' . uniqid() . '.' . $ext;
            $imagePath = $image->storeAs($path, $imageName, 'public');
            $imagePaths[] = Storage::url($imagePath);
        }

        return count($imagePaths) === 1 ? $imagePaths[0] : $imagePaths;
    }


    public function updateImage(Request $request, $inputName, $path, $oldPaths = null)
    {
        if (!$request->hasFile($inputName)) {
            return $oldPaths; // Giữ nguyên nếu không có ảnh mới
        }

        // Nếu có ảnh cũ, xóa chúng
        if ($oldPaths) {
            $oldPathsArray = is_array($oldPaths) ? $oldPaths : [$oldPaths];

            foreach ($oldPathsArray as $oldPath) {
                $oldPath = str_replace('/storage/', '', $oldPath); // Loại bỏ /storage/ để khớp với đường dẫn thực
                if (Storage::exists('public/' . $oldPath)) {
                    Storage::delete('public/' . $oldPath);
                }
            }
        }

        return $this->uploadImage($request, $inputName, $path);
    }


    public function uploadMultiImage(Request $request, $inputName, $path)
    {
        $imagePaths = [];
        if ($request->hasFile($inputName)) {
            $images = $request->{$inputName};
            foreach ($images as $image) {
                $ext = $image->getClientOriginalExtension();
                $imageName = 'media_' . uniqid() . '.' . $ext;

                // Lưu vào thư mục storage/app/products
                $imagePath = $image->storeAs('products', $imageName, 'public');
                $imagePaths[] = Storage::url($imagePath); // Trả về đường dẫn có thể truy cập từ public
            }
            return $imagePaths;
        }
    }

    public function deleteImage(string $path)
    {
        if (Storage::exists('public/' . $path)) {
            Storage::delete('public/' . $path);
        }
    }



    public function uploadFileImage($image, $path)
    {
        if (!$image) {
            return null;
        }

        $ext = $image->getClientOriginalExtension();
        $imageName = 'media_' . uniqid() . '.' . $ext;
        $imagePath = $image->storeAs($path, $imageName, 'public');

        return 'storage/' . str_replace('public/', '', $imagePath);
    }
}
