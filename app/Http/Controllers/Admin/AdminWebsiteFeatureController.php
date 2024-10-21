<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebsiteFeatureCreateRequest;
use App\Http\Requests\WebsiteFeatureUpdateRequest;
use App\Models\WebsiteFeature;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class AdminWebsiteFeatureController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        $websiteFeatures = WebsiteFeature::all();
        return view('admin.partials.website_feature.index', compact('websiteFeatures'));
    }

    public function create()
    {
        return view('admin.partials.website_feature.create');
    }

    public function store(WebsiteFeatureCreateRequest $request)
    {
        $imagePath = $this->uploadImage($request, 'icon_image', 'uploads/website_feature');
        $websiteFeature = new WebsiteFeature();
        $websiteFeature->name = $request->name;
        $websiteFeature->description = $request->description;
        $websiteFeature->status = $request->status;
        $websiteFeature->icon_image = $imagePath;
        $websiteFeature->save();
        toastr()->success('Thêm tính năng website thành công');
        return redirect()->route('website_feature.index');
    }

    public function edit($id)
    {
        $websiteFeature = WebsiteFeature::find($id);
        return view('admin.partials.website_feature.edit', compact('websiteFeature'));
    }

    public function update(WebsiteFeatureUpdateRequest $request, $id)
    {

        $websiteFeature = WebsiteFeature::find($id);
        $imagePath = $this->updateImage($request, 'icon_image', 'uploads/website_feature', $websiteFeature->icon_image);
        $websiteFeature->name = $request->name;
        $websiteFeature->description = $request->description;
        $websiteFeature->status = $request->status;
        $websiteFeature->icon_image = empty(!$imagePath) ? $imagePath : $websiteFeature->icon_image;
        $websiteFeature->save();
        toastr()->success('Cập nhật tính năng website thành công');
        return redirect()->route('website_feature.index');
    }

    public function destroy($id)
    {
        $websiteFeature = WebsiteFeature::find($id);
        $this->deleteImage($websiteFeature->icon_image);
        $websiteFeature->delete();
        return response(['status' => 'success', 'message' => 'Xóa tính năng thành công !']);
    }
    public function changeStatus(Request $request)
    {
        $websiteFeature = WebsiteFeature::find($request->website_feature_id);
        if (!$websiteFeature) {
            return response()->json(['error' => 'Không tìm thấy tính năng này !']);
        }
        $websiteFeature->status = $request->status;
        $websiteFeature->save();
        return response()->json(['success' => 'Cập nhật trạng thái thành công!']);
    }
}
