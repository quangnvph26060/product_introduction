<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getProductByCategoryId($id)
    {
        $category = Category::find($id);

        // Kiểm tra xem category này có phải là category cha hay không
        if ($category->parent_id == null) {
            // Nếu là category cha, lấy tất cả sản phẩm của category cha và các category con

            $productCategories = Category::where('parent_id', $id)->orWhere('id', $id)->pluck('id');
            // dd($productCategories);
            $getProductByCategoryId = Product::whereIn('category_id', $productCategories)->where('status', 'published')->get();
        } else {
            // Nếu không phải category cha, lấy sản phẩm của category đó
            $getProductByCategoryId = Product::where('category_id', $id)->where('status', 'published')->get();
        }

        return view('category' , compact('getProductByCategoryId'));
    }
}
