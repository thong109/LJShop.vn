<?php

namespace App\Providers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Visitor;
use Illuminate\Support\ServiceProvider;

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
        view()->composer('*', function ($view) {
            //total
            $product = Product::all()->count();
            $app_order = Order::all()->count();
            $app_customer = Customer::all()->count();
            $product_views = Product::orderByRaw('CONVERT(product_views, SIGNED) desc')->get();
            $view->with(compact('app_order', 'app_customer','product','product_views'));
        });
    }
}
