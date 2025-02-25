<?php

namespace App\Providers;

use App\Models\Business;
use App\Models\Category;
use App\Models\Config;
use App\Models\IntroductionCategory;
use App\Models\IntroductionPost;
use App\Models\NewsCategory;
use App\Models\Post;
use App\Models\Process;
use App\Models\Product;
use App\Models\ProductAdvantages;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Menu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        view()->composer('partials.header', function ($view) {
            $menu = Menu::make('MyNav', function ($m) {
                // Menu chính
                $m->add('Trang chủ', ['route' => 'home'])->id('home');
                $m->add('Sản phẩm', ['route' => 'product'])->id('product');
                $m->add('Bài viết' , '#')->id('project-case');
                $m->add('Tin tức', '#')->id('news');
            });

            $view->with('menu', $menu);
        });
        Paginator::useBootstrap();
        $categories = Category::whereNull('parent_id')->get();
        $products = Product::where('status', 'published')->orderBy('id', 'desc')->get();
        $productsFooter = Product::where('status', 'published')->orderBy('id', 'desc')->take(3)->get();
        $serviceHome = Service::where('status', 'published')->take(6)->get();

        // Post
        $firstPost = Post::where('status', 'published')->first();
        $listPostHome = Post::where('status', 'published')
            ->where('id', '!=', optional($firstPost)->id)
            ->get();
        $listPostFooter = Post::where('status', 'published')->take(4)->get();
        // Slider banner
        $banners = Slider::where('status', 'published')->orderBy('id', 'desc')->get();
        // Process
        $processHome = Process::where('status', 'published')->orderBy('id', 'desc')->take(4)->get();
        // Businesses
        $businessesHome = Business::where('status', 'published')->get();
        //Config
        $configWebsite = Config::first();
        //Product advantages
        $productAdvantagesHome = ProductAdvantages::where('status', 'published')->take(5)->get();
        //Introduction category
        $introductionCategoriesHome = IntroductionCategory::take(3)->get();
        //Introduction posts
        $introductionPostHome = IntroductionPost::take(12)->get();
        //New category
        $newsCategoryHome = NewsCategory::take(3)->get();
        View::composer('*', function ($view) use (
            $categories,
            $products,
            $serviceHome,
            $firstPost,
            $listPostHome,
            $banners,
            $processHome,
            $businessesHome,
            $configWebsite,
            $productAdvantagesHome,
            $introductionCategoriesHome,
            $introductionPostHome,
            $newsCategoryHome,
            $productsFooter,
            $listPostFooter
        ) {
            $view->with([
                'categories' => $categories,
                'products' => $products,
                'serviceHome' => $serviceHome,
                'firstPost' => $firstPost,
                'listPostHome' => $listPostHome,
                'banners' => $banners,
                'processHome' => $processHome,
                'businessesHome' => $businessesHome,
                'configWebsite' => $configWebsite,
                'productAdvantagesHome' => $productAdvantagesHome,
                'introductionCategoriesHome' => $introductionCategoriesHome,
                'introductionPostHome' => $introductionPostHome,
                'newsCategoryHome' => $newsCategoryHome,
                'productsFooter' => $productsFooter,
                'listPostFooter' => $listPostFooter
            ]);
        });
    }
}
