<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['ar','en','fr','es'])
                ->flags([
                    'ar' => asset('flags/ar.svg'),
                    'fr' => asset('flags/fr.svg'),
                    'en' => asset('flags/us.svg'),
                    'es' => asset('flags/es.svg')
                ]);
        });
    }
}
