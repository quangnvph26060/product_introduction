<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   public function index()  {
        $user = Auth::user();
        $countPost = Post::count();
        $countProduct = Product::count();
        $countNew = News::count();
        $countUser = User::count();
        return view('admin/partials/dashboard',compact('user' , 'countPost' , 'countProduct' , 'countNew' , 'countUser'));
   }
}
