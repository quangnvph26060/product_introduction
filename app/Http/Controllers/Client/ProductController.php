<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 'published')->orderBy('id', 'desc')->paginate(9);
        return view('product', compact('products'));
    }
    public function detailProduct($id){
        $productDetail = Product::find($id);
        return view('product_detail' , compact('productDetail'));
    }
}
