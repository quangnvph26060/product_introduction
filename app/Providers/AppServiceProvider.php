<?php

namespace App\Providers;

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
                $m->add('Product',['route' => 'product'])->id('product');
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
    }
}
