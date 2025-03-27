<?php

namespace App\Models;

use App\Models\Scopes\CompanyScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Master extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'full_name',
        'dob',
        'gender',
        'phone',
        'email',
        'address',
        'rank_id',
        'company_id',
    ];

    protected $appends = [
        'code',
    ];

    protected $casts = [
        'dob' => 'date',
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new CompanyScope);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function rank(): BelongsTo
    {
        return $this->belongsTo(Rank::class);
    }

    /**
     * Get the degrees for the master.
     */
    public function degrees(): HasMany
    {
        return $this->hasMany(Degree::class);
    }

    /**
     * Get the rank histories for the master.
     */
    public function rankHistories(): HasMany
    {
        return $this->hasMany(RankHistory::class);
    }

    public function getCodeAttribute(): string
    {
        return 'M-' . str_pad($this->id, 9, '0', STR_PAD_LEFT);
    }
}
