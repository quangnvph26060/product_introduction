<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminProductController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        $listProducts = Product::all();
        return view('admin.partials.product.index', compact('listProducts'));
    }
    public function showFormProduct()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();

        return view('admin.partials.product.create', compact('categories'));
    }
    public function addProduct(ProductCreateRequest $request)
    {
        $imagePath = $this->uploadImage($request, 'main_image', 'uploads/product');
        $product = new Product();
        $product->name = $request->name;
        $product->main_image = $imagePath;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->status = $request->status;
        $product->category_id = $request->category_id;
        $product->save();
        toastr()->success('Thêm sản phẩm thành công !');
        return redirect()->route('admin.product');
    }
    public function editProduct($id)
    {
        $product = Product::where('id', $id)->first();
        $subcategories = Category::whereNotNull('parent_id')->get();
        return view('admin.partials.product.edit', compact('product', 'subcategories'));
    }
    public function updateProduct(ProductUpdateRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $imagePath = $this->updateImage($request, 'main_image', 'uploads/product', $product->main_image);
        $product->main_image = empty(!$imagePath) ? $imagePath : $product->main_image;
        $product->name = $request->name;
        $product->status = $request->status;
        $product->category_id = $request->category_id;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->save();
        toastr()->success('Cập nhật sản phẩm thành công !');
        return redirect()->route('admin.product');
    }
    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $this->deleteImage($product->main_image);
        $galleryImages = ProductImage::where('product_id', $id)->get();
        foreach ($galleryImages as $image) {
            $this->deleteImage($image->image_path);
            $image->delete();
        }
        $product->delete();
        toastr()->success('Xóa sản phẩm thành công !');
        return \redirect()->back();
    }


    //Ảnh chi tiết của sản phẩm
    public function listImageGalley($productId)
    {
        $product = Product::findOrFail($productId);
        $productImageGallery = ProductImage::where('product_id', $productId)->get();
        return view('admin.partials.product.image-gallery', compact('product', 'productImageGallery'));
    }

    public function storeImageGalley(Request $request)
    {
        $request->validate([
            'image_path' => 'required',
            'image_path.*' => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $imagePaths = $this->uploadMultiImage($request, 'image_path', 'uploads/product');
        foreach ($imagePaths as $path) {
            $productImageGallery = new ProductImage();
            $productImageGallery->image_path = $path;
            $productImageGallery->product_id = $request->product_id;
            $productImageGallery->save();
        }
        toastr()->success('Thêm ảnh thành công !');
        return redirect()->back();
    }

    public function deleteImageProduct($id)
    {
        $productImage = ProductImage::findOrFail($id);
        $this->deleteImage($productImage->image_path);
        $productImage->delete();
        toastr()->success('Xóa thành công !');
        return redirect()->back();
    }

    public function changeStatus(Request $request)
    {
        $product = Product::find($request->product_id);
        if (!$product) {
            return response()->json(['error' => 'Không tìm thấy sản phẩm!']);
        }
        $product->status = $request->status;
        $product->save();
        return response()->json(['success' => 'Cập nhật trạng thái thành công!']);
    }
}
