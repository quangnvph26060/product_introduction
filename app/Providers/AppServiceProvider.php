<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Service;
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
        $products = Product::where('status' , 'published')->orderBy('id' , 'desc')->get();
        $serviceHome = Service::where('status' , 'published')->orderBy('id' ,'desc')->take(6)->get();
        View::composer('*', function ($view) use ($categories , $products , $serviceHome) {
            $view->with([
                'categories' => $categories,
                'products' => $products,
                'serviceHome' => $serviceHome
            ]);
        });
    }
}
