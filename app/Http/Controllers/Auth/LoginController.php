<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index (){
        $title = "Đăng nhập admin";
        return view('admin/login',compact('title'));
    }
}
