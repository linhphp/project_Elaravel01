<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\CategoryProduct;
use App\BrandProduct;
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
        //
        view()->composer('layout',function($view){
            $cate_products = CategoryProduct::all()->pluck('id','cate_name');
            $brand_products = BrandProduct::all()->pluck('id','brand_name');
            $view->with(['cate_products' => $cate_products,'brand_products' => $brand_products]);
        });
    }
}
