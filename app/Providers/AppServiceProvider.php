<?php

namespace App\Providers;

use App\Models\Plan;
use App\Observers\PlanObserver;
use Illuminate\Support\Facades\Schema;
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
        //Observers
        Plan::observe(PlanObserver::class);

        //Database alter
        Schema::defaultStringLength(191);

    }
}
