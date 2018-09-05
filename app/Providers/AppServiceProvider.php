<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \App\Category;
use \App\Post;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('categories',Category::get());
        
        view()->share('lastPosts',Post::select('posts.*')->orderBy('id','desc')->limit(4)->get());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
