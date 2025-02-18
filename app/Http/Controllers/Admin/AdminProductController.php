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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
    public function addProduct(Request $request)
    {
        // dd($request->all());
        $imagePath = $this->uploadImage($request, 'main_image', 'uploads/product');
        $product = new Product();
        $product->name = $request->name;
        $product->main_image = $imagePath;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->status = $request->status;
        $product->slug = Str::slug($request->name, '-');
        $product->category_id = $request->category_id;
        $product->title_seo = $request->title_seo;
        $product->description_seo = $request->description_seo;
        $product->keyword_seo = $request->keyword_seo;
        $product->save();


        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $imagePath =  $this->uploadFileImage($image, 'uploads/product');

                if ($imagePath) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $imagePath,
                    ]);
                }
            }
        }
        toastr()->success('Thêm sản phẩm thành công !');
        return redirect()->route('admin.product');
    }
    public function editProduct($id)
    {
        $product = Product::where('id', $id)->first();
        $subcategories = Category::whereNotNull('parent_id')->get();
        $images = ProductImage::where('product_id', $id)->get();
        return view('admin.partials.product.create', compact('product', 'subcategories', 'images'));
    }
    public function updateProduct(ProductUpdateRequest $request, $id)
    {
        // dd($request->all());

        $product = Product::findOrFail($id);
        $imagePath = $this->updateImage($request, 'image', 'uploads/product', $product->main_image);
        $product->main_image = empty(!$imagePath) ? $imagePath : $product->main_image;
        $product->name = $request->name;
        $product->status = $request->status;
        $product->tags = $request->tags;
        $product->category_id = $request->category_id;
        $product->slug = $request->slug;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->title_seo = $request->title_seo;
        $product->description_seo = $request->description_seo;
        $product->keyword_seo = $request->keyword_seo;
        $product->save();

        $oldImages = $request->input('old');
        $productImages = ProductImage::where('product_id', $id)->pluck('id')->toArray();
        $imagesToKeep = array_intersect($oldImages, $productImages);
        $imagesToDelete = array_diff($productImages, $imagesToKeep);

        // Xóa các ảnh không cần thiết
        foreach ($imagesToDelete as $imageId) {
            $image = ProductImage::find($imageId);
            if ($image) {
                // Xóa file ảnh trong thư mục lưu trữ
                Storage::delete($image->image_path);
                // Xóa ảnh khỏi cơ sở dữ liệu
                $image->delete();
            }
        }
        // Kiểm tra nếu có ảnh mới
        if ($request->hasFile('images')) {
            // Lưu ảnh mới vào cơ sở dữ liệu và thư mục lưu trữ
            foreach ($request->file('images') as $image) {
                $imagePath = $this->uploadFileImage($image, 'uploads/product');

                if ($imagePath) {
                    // Thêm ảnh mới vào cơ sở dữ liệu
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $imagePath,
                    ]);
                }
            }
        }
        toastr()->success('Cập nhật sản phẩm thành công !');
        return redirect()->back();
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
