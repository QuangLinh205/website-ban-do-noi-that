<?php

namespace App\Providers;
use App\Models\Category;
use App\Helper\CartHelper;

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
        $cart=new CartHelper();
        // dd($cart);
        view()->composer('*',function($view){
            $view->with([
                'category'=>Category::where('status',1)->get(),
                'cart'=>new CartHelper()
            ]);
        });
    }
}
