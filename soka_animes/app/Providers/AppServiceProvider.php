<?php

namespace App\Providers;

use App\Models\Character;
use App\Models\User;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        $topWorks = Work::select('works.*', DB::raw('COUNT(work_likes.id) as likes_count'))
            ->leftJoin('work_likes', 'works.id', '=', 'work_likes.work_id')
            ->groupBy('works.id')
            ->orderByDesc('likes_count')
            ->take(6)
            ->get();

        $topCharacters = Character::select('characters.*', DB::raw('COUNT(character_likes.id) as likes_count'))
            ->leftJoin('character_likes', 'characters.id', '=', 'character_likes.character_id')
            ->groupBy('characters.id')
            ->orderByDesc('likes_count')
            ->take(6)
            ->get();


        view()->share('works', $works);
        view()->share('characters', $characters);
        view()->share('topWorks', $topWorks);
        view()->share('topCharacters', $topCharacters);


        Schema::defaultStringLength(191);
    }
}
