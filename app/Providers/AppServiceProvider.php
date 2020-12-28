<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use function Sodium\add;

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
        View::composer('front.layouts.sidebar', function ($view) {
            if (Cache::has('posts') && Cache::has('cats')) {
                $posts = Cache::get('posts');
                $cats = Cache::get('cats');
            } else {
                $posts = Post::orderBy('views', 'desc')->limit(3)->get();
                $cats = Category::withCount('posts')->orderBy('posts_count', 'desc')->get();
                Cache::put('posts', $posts, now()->addMinutes(1));
                Cache::put('cats', $cats, now()->addMinutes(1));
            }
            $view->with('popular_posts', $posts);
            $view->with('cats', $cats);
        });

        View::composer('front.layouts.navbar', function ($view) {
            $view->with('navbar_cats', Category::all());
        });

        View::composer('front.layouts.footer', function ($view) {
            $popular_post = Cache::get('posts');
            $popular_cats = Cache::get('cats');
            if (Cache::has('recent_posts')) {
                $recent_posts = Cache::get('recent_posts');
            } else {
                $recent_posts = Post::orderBy('id', 'desc')->limit(3)->get();
                Cache::put('recent_posts', $recent_posts, now()->addMinutes(1));
            }
            $view->with('recent_posts', $recent_posts);
            $view->with('popular_posts', $popular_post);
            $view->with('cats', $popular_cats);
        });
    }
}
