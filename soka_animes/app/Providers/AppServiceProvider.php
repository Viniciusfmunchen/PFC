<?php

namespace App\Providers;

use App\Models\Character;
use App\Models\Work;
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
        $works = Work::all();
        $characters = Character::all();

        view()->share('works', $works);
        view()->share('characters', $characters);

        Schema::defaultStringLength(191);
    }
}
