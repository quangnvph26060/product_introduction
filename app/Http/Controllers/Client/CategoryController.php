<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getProductByCategoryId($id)
    {
        $getProductByCategoryId = Product::where('category_id' , $id)->where('status' , 'published')->paginate(9);
        return view('category' , compact('getProductByCategoryId'));
    }
}
