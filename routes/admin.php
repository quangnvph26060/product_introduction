<?php

use App\Http\Controllers\admin\AdminBusinessesController;
use App\Http\Controllers\Admin\AdminProductController as AdminAdminProductController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\admin\AdminPostController;
use App\Http\Controllers\admin\AdminProcessController;
use App\Http\Controllers\admin\AdminSlidersController;
use App\Http\Controllers\admin\AmdminWebsiteFeatureController;
use App\Http\Controllers\GeneralSettingController;

Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [AuthLoginController::class, 'index'])->name('login');
    Route::post('/login', [AuthLoginController::class, 'login']);

});
Route::post('/logout', [AuthLoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::prefix('categories')->group(function () {
        Route::get('/', [AdminCategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('/categories/create', [AdminCategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/categories', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/categories/{category}/edit', [AdminCategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::put('/categories/{category}', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('/categories/{category}', [AdminCategoryController::class, 'destroy'])->name('admin.categories.destroy');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/', [AdminAdminProductController::class, 'index'])->name('admin.product');
        Route::get('/create', [AdminAdminProductController::class, 'showFormProduct'])->name('admin.add.product');
        Route::post('/' , [AdminAdminProductController::class , 'addProduct'])->name('admin.store.product');
        Route::get('/edit/{id}' , [AdminAdminProductController::class , 'editProduct'])->name('admin.edit.product');
        Route::post('/update/{id}' , [AdminAdminProductController::class , 'updateProduct'])->name('admin.update.product');
        Route::get('/delete/{id}' , [AdminAdminProductController::class , 'deleteProduct'])->name('admin.delete.product');
        Route::get('/upload/{id}/image-gallery' , [AdminAdminProductController::class , 'listImageGalley'])->name('list.image-gallery.product');
        Route::post('/image-gallery/store' , [AdminAdminProductController::class , 'storeImageGalley'])->name('store.image-gallery.product');
        Route::get('/image-gallery/delete/{id}' , [AdminAdminProductController::class , 'deleteImageProduct'])->name('delete.image-gallery.product');
        Route::post('/change-status' , [AdminAdminProductController::class , 'changeStatus'])->name('admin.product.change-status');
    });

    Route::prefix('businesses')->group(function () {
        Route::get('/', [AdminBusinessesController::class, 'index']);
        Route::get('/businesses/create', [AdminBusinessesController::class, 'create']);
        Route::post('/businesses', [AdminBusinessesController::class, 'store']);
        // Thêm các route khác tùy theo nhu cầu
    });

    Route::prefix('sliders')->group(function () {
        Route::get('/sliders', [AdminSlidersController::class, 'index']);
        Route::get('/sliders/create', [AdminSlidersController::class, 'create']);
        Route::post('/sliders', [AdminSlidersController::class, 'store']);
        // Thêm các route khác tùy theo nhu cầu
    });

    Route::prefix('process')->group(function () {
        Route::get('/', [AdminProcessController::class, 'index']);
        Route::get('/process/create', [AdminProcessController::class, 'create']);
        Route::post('/process', [AdminProcessController::class, 'store']);
        // Thêm các route khác tùy theo nhu cầu
    });

    Route::prefix('websiteFeature')->group(function () {
        Route::get('/', [AmdminWebsiteFeatureController::class, 'index'])->name('website_features.index');
        Route::get('/create', [AmdminWebsiteFeatureController::class, 'create'])->name('website_features.create');
        Route::post('/', [AmdminWebsiteFeatureController::class, 'store'])->name('website_features.store');
        Route::get('/{id}/edit', [AmdminWebsiteFeatureController::class, 'edit'])->name('website_features.edit');
        Route::put('/{id}', [AmdminWebsiteFeatureController::class, 'update'])->name('website_features.update');
        Route::delete('/{id}', [AmdminWebsiteFeatureController::class, 'destroy'])->name('website_features.destroy');
    });

    Route::prefix('settings')->group(function () {
        Route::get('/', [GeneralSettingController::class, 'index'])->name('settings.index');
        Route::get('/create', [GeneralSettingController::class, 'create'])->name('settings.create');
        Route::post('/', [GeneralSettingController::class, 'store'])->name('settings.store');
        Route::get('/{setting}/edit', [GeneralSettingController::class, 'edit'])->name('settings.edit');
        Route::put('/{setting}', [GeneralSettingController::class, 'update'])->name('settings.update');
        Route::delete('/{setting}', [GeneralSettingController::class, 'destroy'])->name('settings.destroy');
    });

    Route::prefix('post')->group(function () {
        Route::get('/', [AdminPostController::class, 'index'])->name('post.index');
        Route::get('/create', [AdminPostController::class, 'create'])->name('post.create');
        Route::post('/', [AdminPostController::class, 'store'])->name('post.store');
        Route::get('/edit/{id}', [AdminPostController::class, 'edit'])->name('post.edit');
        Route::post('/update/{id}', [AdminPostController::class, 'update'])->name('post.update');
        Route::delete('delete/{id}', [AdminPostController::class, 'destroy'])->name('post.destroy');
        Route::post('change-status/', [AdminPostController::class , 'changeStatus'])->name('post.change-status');
    });
});
