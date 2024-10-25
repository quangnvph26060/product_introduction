<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function detailPost($title){
        $post = Post::where('title' , 'like' , $title)->first();
        return view('post_detail' , compact('post'));
    }
}
