<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \App\Models\Categorias;

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
        $categoriasMenu = Categorias::all();
        view()->share('categoriasMenu', $categoriasMenu);
    }
}
