<?php

namespace App\Observers;

use App\Models\Degree;
use Filament\Facades\Filament;

class DegreeObserver
{
    /**
     * Handle the Degree "creating" event.
     */
    public function creating(Degree $degree): void
    {
        // Set company_id if it's not already set and we're in a Filament context with tenancy
        if (empty($degree->company_id) && Filament::hasTenancy() && Filament::getTenant()) {
            $degree->company_id = Filament::getTenant()->id;
        }
    }

    /**
     * Handle the Degree "created" event.
     */
    public function created(Degree $degree): void
    {
        //
    }

    /**
     * Handle the Degree "updated" event.
     */
    public function updated(Degree $degree): void
    {
        //
    }

    /**
     * Handle the Degree "deleted" event.
     */
    public function deleted(Degree $degree): void
    {
        //
    }

    /**
     * Handle the Degree "restored" event.
     */
    public function restored(Degree $degree): void
    {
        //
    }

    /**
     * Handle the Degree "force deleted" event.
     */
    public function forceDeleted(Degree $degree): void
    {
        //
    }
}
