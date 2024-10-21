<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceCreateRequest;
use App\Http\Requests\ServiceUpdateRequest;
use App\Models\Service;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::orderBy('id', 'desc')->get();
        return view('admin.partials.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partials.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceCreateRequest $request)
    {
        $imagePath = $this->uploadImage($request, 'images', 'uploads/service');
        $service = new Service();
        $service->name = $request->name;
        $service->description = $request->description;
        $service->status = $request->status;
        $service->images = $imagePath;
        $service->save();
        toastr()->success('Thêm dịch vụ thành công !');
        return redirect()->route('service.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        return view('admin.partials.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceUpdateRequest $request, string $id)
    {
        $service = Service::findOrFail($id);
        $imagePath = $this->updateImage($request, 'images', 'uploads/service', $service->images);
        $service->name = $request->name;
        $service->description = $request->description;
        $service->status = $request->status;
        $service->images = empty(!$imagePath) ? $imagePath : $service->images;
        $service->save();
        toastr()->success('Cập nhật dịch vụ thành công !');
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $this->deleteImage($service->images);
        $service->delete();
        return response(['status' => 'success', 'message' => 'Xóa dịch vụ thành công !']);
    }
    public function changeStatusService(Request $request)
    {
        $service = Service::find($request->service_id);
        if (!$service) {
            return response()->json(['error' => 'Không tìm thấy dịch vụ!']);
        }
        $service->status = $request->status;
        $service->save();
        return response()->json(['success' => 'Cập nhật trạng thái thành công!']);
    }
}
