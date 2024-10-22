<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProcessCreateRequest;
use App\Http\Requests\ProcessUpdateRequest;
use App\Models\Process;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class AdminProcessController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $processes = Process::all();
        return view('admin.partials.processes.index', compact('processes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partials.processes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProcessCreateRequest $request)
    {
         $imagePath = $this->uploadImage($request , 'image' , 'uploads/process');
         $iconPath = $this->uploadImage($request , 'icon' , 'uploads/process');
         $process = new Process();
         $process->title = $request->title;
         $process->description = $request->description;
         $process->icon = $iconPath;
         $process->image = $imagePath;
         $process->status = $request->status;
         $process->save();
         toastr()->success('Đã thêm quá trình thành công !');
         return redirect()->route('process.index');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $process = Process::find($id);
        return view('admin.partials.processes.edit', compact('process'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProcessUpdateRequest $request, $id)
    {
        $process = Process::findOrFail($id);
        $imagePath = $this->updateImage($request, 'image', 'uploads/process', $process->image);
        $iconPath = $this->updateImage($request, 'image', 'uploads/process', $process->image);
        $process->title = $request->title;
        $process->description = $request->description;
        $process->status = $request->status;
        $process->image = empty(!$imagePath) ? $imagePath : $process->image;
        $process->icon =  empty(!$imagePath) ? $imagePath : $process->icon;
        $process->save();
        toastr()->success('Cập nhật quá trình thành công !');
        return redirect()->route('process.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $process = Process::findOrFail($id);
        $this->deleteImage($process->image);
        $this->deleteImage($process->icon);
        $process->delete();
        return response(['status' => 'success', 'message' => 'Xóa quá trình thành công !']);
    }
    public function changeStatus(Request $request)
    {
        $process = Process::find($request->process_id);
        if (!$process) {
            return response()->json(['error' => 'Không tìm thấy quá trình này!']);
        }
        $process->status = $request->status;
        $process->save();
        return response()->json(['success' => 'Cập nhật trạng thái thành công!']);
    }
}