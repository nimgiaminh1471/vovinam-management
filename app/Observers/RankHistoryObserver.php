<?php

namespace App\Observers;

use App\Models\RankHistory;
use Filament\Facades\Filament;

class RankHistoryObserver
{
    /**
     * Handle the RankHistory "creating" event.
     */
    public function creating(RankHistory $rankHistory): void
    {
        // Set company_id if it's not already set and we're in a Filament context with tenancy
        if (empty($rankHistory->company_id) && Filament::hasTenancy() && Filament::getTenant()) {
            $rankHistory->company_id = Filament::getTenant()->id;
        }
    }

    /**
     * Handle the RankHistory "created" event.
     */
    public function created(RankHistory $rankHistory): void
    {
        //
    }

    /**
     * Handle the RankHistory "updated" event.
     */
    public function updated(RankHistory $rankHistory): void
    {
        //
    }

    /**
     * Handle the RankHistory "deleted" event.
     */
    public function deleted(RankHistory $rankHistory): void
    {
        //
    }

    /**
     * Handle the RankHistory "restored" event.
     */
    public function restored(RankHistory $rankHistory): void
    {
        //
    }

    /**
     * Handle the RankHistory "force deleted" event.
     */
    public function forceDeleted(RankHistory $rankHistory): void
    {
        //
    }
}
