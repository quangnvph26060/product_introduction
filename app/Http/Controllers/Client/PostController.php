<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function detailPost($slug){
        $post = Post::where('slug' , 'like' , $slug)->first();
        return view('post_detail' , compact('post'));
    }
}
