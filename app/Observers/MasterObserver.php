<?php

namespace App\Observers;

use App\Models\Master;
use Filament\Facades\Filament;

class MasterObserver
{
    /**
     * Handle the Master "creating" event.
     */
    public function creating(Master $master): void
    {
        // Set company_id if it's not already set and we're in a Filament context with tenancy
        if (empty($master->company_id) && Filament::hasTenancy() && Filament::getTenant()) {
            $master->company_id = Filament::getTenant()->id;
        }
    }

    /**
     * Handle the Master "created" event.
     */
    public function created(Master $master): void
    {
        //
    }

    /**
     * Handle the Master "updated" event.
     */
    public function updated(Master $master): void
    {
        //
    }

    /**
     * Handle the Master "deleted" event.
     */
    public function deleted(Master $master): void
    {
        //
    }

    /**
     * Handle the Master "restored" event.
     */
    public function restored(Master $master): void
    {
        //
    }

    /**
     * Handle the Master "force deleted" event.
     */
    public function forceDeleted(Master $master): void
    {
        //
    }
}
