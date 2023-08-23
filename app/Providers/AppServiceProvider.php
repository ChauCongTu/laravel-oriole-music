<?php

namespace App\Providers;

use App\Models\Catalogue;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        Paginator::useBootstrapFour();
        view()->composer('layouts.master', function ($view) {
            $categories = Category::with('posts')->get();
            $courses = Course::orderBy('id', 'DESC')->limit(5)->get();
            $catalogues = Catalogue::all();
            $view->with('courses', $courses)->with('categories', $categories)->with('catalogues', $catalogues);
        });
    }
}
