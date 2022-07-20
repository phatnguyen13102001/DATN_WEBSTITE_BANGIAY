<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\View;

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
     
        view()->composer('*', function($view){
            $countproduct= Product::all()->count();
            $lstorder1 = Order::where('id_orderstatus', '=', '1')->count();
            $lstordersum1 =
            Order::where('id_orderstatus', '=', '1')->selectRaw("SUM(total) as total1")
            ->groupBy('id_orderstatus')
            ->first();
            $lstordersum2 =
            Order::where('id_orderstatus', '=', '2')->selectRaw("SUM(total) as total2")
            ->groupBy('id_orderstatus')
            ->first();
            $lstordersum3 =
            Order::where('id_orderstatus', '=', '3')->selectRaw("SUM(total) as total3")
            ->groupBy('id_orderstatus')
            ->first();
            $lstordersum4 =
            Order::where('id_orderstatus', '=', '4')->selectRaw("SUM(total) as total4")
            ->groupBy('id_orderstatus')
            ->first();
             $lstorder2 = Order::where('id_orderstatus','=','2')->count();
             $lstorder3 = Order::where('id_orderstatus','=','3')->count();
             $lstorder4 = Order::where('id_orderstatus','=','4')->count();
             $view->with('lstorder1',$lstorder1)->with('lstorder2',$lstorder2)->with('lstorder3',$lstorder3)->with('lstorder4',$lstorder4)->with('countproduct',$countproduct)->with('lstordersum1',$lstordersum1)->with('lstordersum2',$lstordersum2)->with('lstordersum3',$lstordersum3)->with('lstordersum4',$lstordersum4);
        });
    }
}
