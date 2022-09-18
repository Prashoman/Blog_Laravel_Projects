<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    // Paginator::useBootstrapFour();
    View::share('Category', \App\Models\Category::orderBy('id', 'DESC')->get());
    View::share('all_tag', \App\Models\Tag::orderBy('id', 'DESC')->get());
    }
}
