<?php

use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Client\CategoryController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\IntroductionPostController;
use App\Http\Controllers\Client\NewController;
use App\Http\Controllers\Client\PostController;
use App\Http\Controllers\Client\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/demo', function () {
//     return view('client.layouts.master');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/category/{id}' , [CategoryController::class , 'getProductByCategoryId'])->name('product.category');
Route::get('/product/{id}' , [ProductController::class , 'detailProduct'])->name('product.detail');

Route::get('/post/{title}' , [PostController::class , 'detailPost'])->name('post.detail');
Route::get('/new/{title}' , [NewController::class , 'detailNew'])->name('new.detail');
Route::get('/introduction_post/{title}' , [IntroductionPostController::class , 'detailIntroductionPost'])->name('introduction_post.detail');
Route::prefix('admin')->group(function () {
    require __DIR__.'/admin.php';
});