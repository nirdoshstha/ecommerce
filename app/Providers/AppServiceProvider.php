<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Setting;
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
        $menu = Menu::active()->whereNull('parent_id')->orderBy('rank')->get();
        view()->share('menu',$menu);


        $shipping = Setting::active()->get();
        view()->share('shipping',$shipping);

    }
}
