<?php

namespace App\Providers;

use App\View\Components\Corner;
use App\View\Components\fieldBottom;
use Illuminate\Support\Facades\Blade;
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
        Blade::component('corner',Corner::class);
        Blade::component('fieldBottom',fieldBottom::class);
    }
}
