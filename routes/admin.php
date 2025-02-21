<?php

use App\Http\Controllers\admin\AdminBusinessesController;
use App\Http\Controllers\Admin\AdminProductController as AdminAdminProductController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminIntroductionCategoryController;
use App\Http\Controllers\Admin\AdminIntroductionPostController;
use App\Http\Controllers\Admin\AdminNewCategoryController;
use App\Http\Controllers\Admin\AdminNewController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminProcessController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminSlidersController;
use App\Http\Controllers\Admin\AdminWebsiteController;

use App\Http\Controllers\Admin\AdminWebsiteFeatureController;

use App\Http\Controllers\Admin\AmdminWebsiteFeatureController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\ProductAdvantagesController;
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
        Route::get('/categories/{id}/edit', [AdminCategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::post('/categories/{id}', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('/categories/{id}', [AdminCategoryController::class, 'destroy'])->name('admin.categories.destroy');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/', [AdminAdminProductController::class, 'index'])->name('admin.product');
        Route::get('/create', [AdminAdminProductController::class, 'showFormProduct'])->name('admin.add.product');
        Route::post('/', [AdminAdminProductController::class, 'addProduct'])->name('admin.store.product');
        Route::get('/edit/{id}', [AdminAdminProductController::class, 'editProduct'])->name('admin.edit.product');
        Route::post('/update/{id}', [AdminAdminProductController::class, 'updateProduct'])->name('admin.update.product');
        Route::get('/delete/{id}', [AdminAdminProductController::class, 'deleteProduct'])->name('admin.delete.product');
        Route::get('/upload/{id}/image-gallery', [AdminAdminProductController::class, 'listImageGalley'])->name('list.image-gallery.product');
        Route::post('/image-gallery/store', [AdminAdminProductController::class, 'storeImageGalley'])->name('store.image-gallery.product');
        Route::get('/image-gallery/delete/{id}', [AdminAdminProductController::class, 'deleteImageProduct'])->name('delete.image-gallery.product');
        Route::post('/change-status', [AdminAdminProductController::class, 'changeStatus'])->name('admin.product.change-status');
    });

    Route::prefix('businesses')->group(function () {
        Route::get('/', [AdminBusinessesController::class, 'index'])->name('businesses.index');
        Route::get('/create', [AdminBusinessesController::class, 'create'])->name('businesses.create');
        Route::post('/store', [AdminBusinessesController::class, 'store'])->name('businesses.store');
        Route::get('/edit/{id}', [AdminBusinessesController::class, 'edit'])->name('businesses.edit');
        Route::post('/update/{id}', [AdminBusinessesController::class, 'update'])->name('businesses.update');
        Route::delete('delete/{id}', [AdminBusinessesController::class, 'destroy'])->name('businesses.destroy');
        Route::post('/change-status', [AdminBusinessesController::class, 'changeStatus'])->name('businesses.change-status');
    });
    //Route::resource('businesses' , AdminBusinessesController::class);

    Route::prefix('slider')->group(function () {
        Route::get('/slider', [AdminSlidersController::class, 'index'])->name('slider.index');
        Route::post('/slider/store', [AdminSlidersController::class, 'store'])->name('slider.store');
        Route::get('/delete/{id}', [AdminSlidersController::class, 'destroy'])->name('slider.destroy');
        // Thêm các route khác tùy theo nhu cầu
    });

    Route::prefix('service')->group(function () {
        Route::get('/', [AdminServiceController::class, 'index'])->name('service.index');
        Route::get('/create', [AdminServiceController::class, 'create'])->name('service.create');
        Route::post('/store', [AdminServiceController::class, 'store'])->name('service.store');
        Route::get('/edit/{id}', [AdminServiceController::class, 'edit'])->name('service.edit');
        Route::post('/update/{id}', [AdminServiceController::class, 'update'])->name('service.update');
        Route::delete('/delete/{id}', [AdminServiceController::class, 'destroy'])->name('service.destroy');
        Route::post('/change-status', [AdminServiceController::class, 'changeStatusService'])->name('service.change-status');
    });
    Route::resource('website', AdminWebsiteController::class);
    Route::resource('introduction_categories', AdminIntroductionCategoryController::class);
    Route::resource('introduction_posts', AdminIntroductionPostController::class);
    Route::post('/introduction_posts/change-status', [AdminIntroductionPostController::class, 'changeStatus'])->name('introduction_posts.change-status');
    Route::resource('process' , AdminProcessController::class);
    Route::post('/process/change-status', [AdminProcessController::class, 'changeStatus'])->name('process.change-status');
    Route::resource('product_advantages' , ProductAdvantagesController::class);
    Route::post('/product_advantages/change-status', [ProductAdvantagesController::class, 'changeStatus'])->name('product_advantages.change-status');
    Route::resource('website_feature' , AdminWebsiteFeatureController::class);
    Route::post('/website_feature/change-status', [AdminWebsiteFeatureController::class, 'changeStatus'])->name('website_feature.change-status');
    Route::resource('news_categories' , AdminNewCategoryController::class);
    Route::resource('news' , AdminNewController::class);
    Route::post('/news/change-status', [AdminNewController::class, 'changeStatus'])->name('news.change-status');
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
        Route::get('delete/{id}', [AdminPostController::class, 'destroy'])->name('post.destroy');
        Route::post('change-status/', [AdminPostController::class, 'changeStatus'])->name('post.change-status');
    });

    Route::prefix('config')->group(function () {
        Route::get('/', [ConfigController::class, 'index'])->name('config.index');
        Route::get('/slider', [ConfigController::class, 'slider'])->name('config.slider');
        Route::post('/update', [ConfigController::class, 'update'])->name('config.update');
        Route::post('/update-slider', [ConfigController::class, 'updateSlider'])->name('slider.update');
    });

});
