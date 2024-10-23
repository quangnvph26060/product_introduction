<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductAdvantageCreateRequest;
use App\Http\Requests\ProductAdvantageUpdateRequest;
use App\Models\ProductAdvantages;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class ProductAdvantagesController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        $productAdvantages = ProductAdvantages::all();
        return view('admin.partials.product_advantages.index', compact('productAdvantages'));
    }

    public function create()
    {
        return view('admin.partials.product_advantages.create');
    }
    public function store(ProductAdvantageCreateRequest $request)
    {
        $imagePath = $this->uploadImage($request, 'image', 'uploads/product_advantages');
        $iconPath = $this->uploadImage($request, 'icon', 'uploads/product_advantages');
        $productAdvantages = new ProductAdvantages();
        $productAdvantages->name = $request->name;
        $productAdvantages->icon = $iconPath;
        $productAdvantages->image = $imagePath;
        $productAdvantages->status = $request->status;
        $productAdvantages->description = $request->description;
        $productAdvantages->save();
        toastr()->success('Đã thêm lợi ích sản phẩm thành công !');
        return redirect()->route('product_advantages.index');
    }
    public function edit($id)
    {
        $productAdvantages = productAdvantages::find($id);
        return view('admin.partials.product_advantages.edit', compact('productAdvantages'));
    }
    public function update(ProductAdvantageUpdateRequest $request, $id)
    {
        $productAdvantages = ProductAdvantages::findOrFail($id);
        $imagePath = $this->updateImage($request, 'image', 'uploads/product_advantages', $productAdvantages->image);
        $iconPath = $this->updateImage($request, 'image', 'uploads/product_advantages', $productAdvantages->image);
        $productAdvantages->name = $request->name;
        $productAdvantages->status = $request->status;
        $productAdvantages->image = empty(!$imagePath) ? $imagePath : $productAdvantages->image;
        $productAdvantages->icon =  empty(!$iconPath) ? $iconPath : $productAdvantages->icon;
        $productAdvantages->description = $request->description;
        $productAdvantages->save();
        toastr()->success('Cập nhật lợi ích thành công !');
        return redirect()->route('product_advantages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $productAdvantages = ProductAdvantages::findOrFail($id);
        $this->deleteImage($productAdvantages->image);
        $this->deleteImage($productAdvantages->icon);
        $productAdvantages->delete();
        return response(['status' => 'success', 'message' => 'Xóa lợi ích thành công !']);
    }
    public function changeStatus(Request $request)
    {
        $productAdvantages = ProductAdvantages::find($request->product_advantages_id);
        if (!$productAdvantages) {
            return response()->json(['error' => 'Không tìm thấy lợi ích này!']);
        }
        $productAdvantages->status = $request->status;
        $productAdvantages->save();
        return response()->json(['success' => 'Cập nhật trạng thái thành công!']);
    }
}
