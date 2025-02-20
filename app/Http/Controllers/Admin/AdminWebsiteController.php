<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebsiteCreateRequest;
use App\Http\Requests\WebsiteUpdateRequest;
use App\Models\Website;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class AdminWebsiteController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        $websites = Website::orderBy('id' , 'desc')->get();
        return view('admin.partials.website.index', compact('websites'));
    }

    public function create()
    {
        return view('admin.partials.website.create');
    }

    public function store(WebsiteCreateRequest $request)
    {
        $imagePath = $this->uploadImage($request , 'image' , 'uploads/website');
        $website = new Website();
        $website->title = $request->title;
        $website->description = $request->description;
        $website->image = $imagePath;
        $website->save();
        toastr()->success('Thêm trang web thành công !');
        return redirect()->route('website.index');
    }

    public function edit($id)
    {
        $website = Website::findOrFail($id);
        return view('admin.partials.website.create', compact('website'));
    }

    public function update(WebsiteUpdateRequest $request, $id)
    {
        $website = Website::findOrFail($id);
        $imagePath = $this->updateImage($request, 'image', 'uploads/website', $website->image);
        $website->title = $request->title;
        $website->description = $request->description;
        $website->image = empty(!$imagePath) ? $imagePath : $website->image;
        $website->save();
        toastr()->success('Cập nhật website thành công !');
        return redirect()->route('website.index');
    }

    public function destroy(string $id)
    {
        $website = Website::findOrFail($id);
        $website->introductionCategories->each(function($category){
              $category->introductionPosts->each(function($item){
                    $this->deleteImage($item->image);
                    $item->delete();
              });
              $category->delete();
        });
        $this->deleteImage($website->image);
        $website->delete();
        toastr()->success('Xóa thành công !');
        return redirect()->route('website.index');
    }
}
