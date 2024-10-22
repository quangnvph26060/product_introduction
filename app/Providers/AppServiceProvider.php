<?php

namespace App\Providers;

use App\Models\Business;
use App\Models\Category;
use App\Models\Config;
use App\Models\Post;
use App\Models\Process;
use App\Models\Product;
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
                $m->add('Home', ['route' => 'home'])->id('home');
                $m->add('Product', ['route' => 'product'])->id('product');
                $m->add('Project Case')->id('project-case');
                // Menu "News" với dropdown
                $m->add('News', '#')->id('news');
                // Menu "About Lipin" với dropdown
                $m->add('About Lipin', '#')->id('about');
                // Menu cuối cùng
                $m->add('Contact Us');
            });

            $view->with('menu', $menu);
        });
        Paginator::useBootstrap();
        $categories = Category::whereNull('parent_id')->get();
        $products = Product::where('status', 'published')->orderBy('id', 'desc')->get();
        $serviceHome = Service::where('status', 'published')->orderBy('id', 'desc')->take(6)->get();

        // Post 
        $firstPost = Post::where('status', 'published')->first();
        $listPostHome = Post::where('status', 'published')
            ->where('id', '!=', optional($firstPost)->id)
            ->get();
        // Slider banner
        $banners = Slider::where('status', 'published')->orderBy('id', 'desc')->get();
        // Process
        $processHome = Process::where('status', 'published')->orderBy('id', 'desc')->take(4)->get();
        // Businesses
        $businessesHome = Business::where('status', 'published')->get();
        //Config
        $configWebsite = Config::first();
        View::composer('*', function ($view) use ($categories, $products, $serviceHome, $firstPost, $listPostHome, $banners, $processHome, $businessesHome , $configWebsite) {
            $view->with([
                'categories' => $categories,
                'products' => $products,
                'serviceHome' => $serviceHome,
                'firstPost' => $firstPost,
                'listPostHome' => $listPostHome,
                'banners' => $banners,
                'processHome' => $processHome,
                'businessesHome' => $businessesHome,
                'configWebsite' => $configWebsite
            ]);
        });
    }
}
