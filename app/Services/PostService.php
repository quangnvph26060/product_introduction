<?php

namespace App\Services;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Exception;

class PostService
{
    protected $post;
    public function __construct(Post $post){
        $this->post = $post;
    }
    // Lấy tất cả tin tức
    public function getAllpost()
    {
        return $this->post::all();
    }

    // Lưu bài báo mới vào cơ sở dữ liệu
    public function createpost($data)
    {
        $validatedData =  [
            'title' => $data['title'],
            'description' => $data['description'],
            'status' => $data['status'],
        ];

        if (isset($data['image'])) {
            $logoFilePath = $this->uploadLogo($data['image']);
            $validatedData['image'] = $logoFilePath;
        }

        return $this->post::create($validatedData);
    }


    public function getpostById($id)
    {
        return $this->post::find($id);
    }

    // Cập nhật bài báo
    public function updatepost($data, $id)
    {
        $validatedData =  [
            'title' => $data['title'],
            'description' => $data['description'],
            'status' => $data['status'],
        ];

        if (isset($data['logo'])) {
            $logoFilePath = $this->uploadLogo($data['logo']);
            $validatedData['logo'] = $logoFilePath;
        }

        $sgopost = $this->post::find($id);
        $sgopost->update($validatedData);

        return $sgopost;
    }

    // Xóa bài báo
    public function deletepost($id)
    {
        $sgopost = $this->post::find($id); // Sử dụng $this->post
        if ($sgopost) {
            $sgopost->delete();
        }
    }

    // Phương thức để tải lên logo
    private function uploadLogo($logo)
    {
        $timestamp = Carbon::now()->timestamp;
        $logoFileName = 'image_' . $timestamp . '_' . $logo->getClientOriginalName();
        $logoFilePath = 'storage/post/' . $logoFileName;
        Storage::putFileAs('public/post', $logo, $logoFileName);
        return $logoFilePath;
    }
}
