<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\category;
use App\Models\post;


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
        View::composer('header', function ($view) {
            $categories = Category::where('post','>',0)->get();
            $view->with('categories', $categories);
        });

        View::composer('sidebar', function ($view) {
            $result = post::join('categories', 'posts.category_id', '=', 'categories.category_id')
                    ->join('users', 'posts.author_id', '=', 'users.user_id')
                    ->select('posts.*', 'users.*', 'categories.*')
                    ->get();
            $view->with('result', $result);
            //$view->with('categories', Category::all());
            //return $categories;
        });
       
        //
    }

}
