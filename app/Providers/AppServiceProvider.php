<?php

namespace App\Providers;

use Filament\Facades\Filament;
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
        /* start Filament*/
        Filament::serving(function () {
            // Using Vite
            // Filament::registerViteTheme('resources/css/filament.css');
            Filament::registerScripts([
                asset('js/custom-scripts.js'),
            ]);
             
            Filament::registerStyles([
                'https://unpkg.com/tippy.js@6/dist/tippy.css',
                asset('css/custom-styles.css'),
            ]);
        });
        /*endFilament*/
    }
}
