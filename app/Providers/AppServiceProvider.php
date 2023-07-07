<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use ProtoneMedia\Splade\SpladeTable;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        SpladeTable::defaultPerPageOptions([10, 25, 50, 100]);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }


}