<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use KgBot\LaravelLocalization\Facades\ExportLocalizations;
use View;

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
        //
        View::composer('layouts.app', function ($view) {
            return $view->with([
                'messages' => ExportLocalizations::export()->toFlat(),
            ]);
        });
    }
}
