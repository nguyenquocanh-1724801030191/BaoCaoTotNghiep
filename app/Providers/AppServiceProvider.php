<?php

namespace App\Providers;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Lang;
use App\Slider;
use App\Product;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view){
            if(Session::has('locale')){
                 app()->setLocale(Session::get('locale'));
             }
             $product = Product::get();
            //  $multisp = 'sp_' . app()->getLocale();
            //  dd($multisp);
     });
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
