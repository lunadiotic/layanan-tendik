<?php

namespace App\Providers;

use App\Http\View\Composers\MenuLayananComposer;
use App\Validators\NipRegisteredValidator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        // Extend validators for nip
        (new NipRegisteredValidator)->register();

        // Global State
        View::composer('layouts.partials._sidebar', MenuLayananComposer::class);
    }
}
