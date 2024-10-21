<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BusinessesRequest;
use App\Http\Requests\BusinessesUpdateRequest;
use App\Models\Business;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class AdminBusinessesController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        $businesses = Business::orderBy('id', 'desc')->get();
        return view('admin.partials.businesses.index', compact('businesses'));
    }

    public function create()
    {
        return view('admin.partials.businesses.create');
    }

    public function store(BusinessesRequest $request)
    {
        $imagePath = $this->uploadImage($request, 'image', 'uploads/businesses');
        Business::create([
            'name' => $request->name,
            'description' => $request->description,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'status' => $request->status,
            'image' => $imagePath
        ]);
        toastr()->success('Đã thêm doanh nghiệp thành công!');
        return redirect()->route('businesses.index');
    }

    public function edit($id)
    {
        $business = Business::findOrFail($id);
        return view('admin.partials.businesses.edit', compact('business'));
    }

    public function update(BusinessesUpdateRequest $request, $id)
    {
        $business = Business::findOrFail($id);
        $imagePath = $this->updateImage($request, 'image', 'uploads/businesses', $business->image);
        $business->name = $request->name;
        $business->description = $request->description;
        $business->status = $request->status;
        $business->image = empty(!$imagePath) ? $imagePath : $business->image;
        $business->email = $request->email;
        $business->phone_number = $request->phone_number;
        $business->save();
        toastr()->success('Cập nhật doanh nhiệp thành công !');
        return redirect()->route('businesses.index');
    }

    public function destroy($id)
    {
        $business = Business::findOrFail($id);
        $this->deleteImage($business->image);
        $business->delete();
        return response(['status' => 'success', 'message' => 'Xóa bài viết thành công !']);
    }
    public function changeStatus(Request $request)
    {
        $business = Business::find($request->business_id);
        if (!$business) {
            return response()->json(['error' => 'Không tìm thấy sản phẩm!']);
        }
        $business->status = $request->status;
        $business->save();
        return response()->json(['success' => 'Cập nhật trạng thái thành công!']);
    }
}
