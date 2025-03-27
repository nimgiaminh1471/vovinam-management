<?php

namespace App\Providers;

use App\Models\Degree;
use App\Models\Master;
use App\Models\RankHistory;
use App\Observers\DegreeObserver;
use App\Observers\MasterObserver;
use App\Observers\RankHistoryObserver;
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
        Master::observe(MasterObserver::class);
        Degree::observe(DegreeObserver::class);
        RankHistory::observe(RankHistoryObserver::class);
    }
}
