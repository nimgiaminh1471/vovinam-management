<?php

namespace App\Models;

use App\Models\Scopes\CompanyScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Degree extends Model
{
    protected $fillable = [
        'master_id',
        'rank_id',
        'title',
        'issued_date',
        'certificate_number',
        'company_id',
    ];

    protected $casts = [
        'issued_date' => 'date',
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new CompanyScope);
    }

    /**
     * Get the master that owns the degree.
     */
    public function master(): BelongsTo
    {
        return $this->belongsTo(Master::class);
    }

    /**
     * Get the rank associated with the degree.
     */
    public function rank(): BelongsTo
    {
        return $this->belongsTo(Rank::class);
    }

    /**
     * Get the company that owns the degree.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
