<?php

namespace App\Models;

use App\Models\Scopes\CompanyScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RankHistory extends Model
{
    protected $fillable = [
        'master_id',
        'previous_rank_id',
        'new_rank_id',
        'promotion_date',
        'notes',
        'company_id',
    ];

    protected $casts = [
        'promotion_date' => 'date',
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new CompanyScope);
    }

    /**
     * Get the master associated with this rank history entry.
     */
    public function master(): BelongsTo
    {
        return $this->belongsTo(Master::class);
    }

    /**
     * Get the previous rank.
     */
    public function previousRank(): BelongsTo
    {
        return $this->belongsTo(Rank::class, 'previous_rank_id');
    }

    /**
     * Get the new rank.
     */
    public function newRank(): BelongsTo
    {
        return $this->belongsTo(Rank::class, 'new_rank_id');
    }

    /**
     * Get the company that owns this rank history entry.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
