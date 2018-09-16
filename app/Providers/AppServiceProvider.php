<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \App\Category;
use \App\Post;
use \App\Tag;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(!\App::runningInConsole()){
            
            view()->share('categories',Category::get());

            view()->share('lastPosts',Post::select('posts.*')->orderBy('id','desc')->limit(3)->get());

            view()->share('tags',Tag::get());
        }
        
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
