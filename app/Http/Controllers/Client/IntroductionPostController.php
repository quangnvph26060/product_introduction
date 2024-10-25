<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\IntroductionPost;
use Illuminate\Http\Request;

class IntroductionPostController extends Controller
{
    public function detailIntroductionPost($title){
        $introPost = IntroductionPost::where('title' , 'like' , $title)->first();
        return view('introduction_post_detail' , compact('introPost'));
    }
}
