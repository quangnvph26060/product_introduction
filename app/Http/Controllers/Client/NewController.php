<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewController extends Controller
{
    public function detailNew($title){
        $new = News::where('title' , 'like' , $title)->first();
        return view('new_detail' , compact('new'));
    }
}
