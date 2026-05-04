<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class UserInput extends Model
{
    protected $fillable = [
        'session_uuid',
        'ipk',
    ];

    protected $casts = [
        'ipk' => 'decimal:2',
    ];

    /**
     * Auto-generate UUID saat record dibuat jika belum ada.
     */
    protected static function booted(): void
    {
        static::creating(function (UserInput $model) {
            if (empty($model->session_uuid)) {
                $model->session_uuid = (string) Str::uuid();
            }
        });
    }

    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class, 'uesr_skills');
    }

    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class, 'uesr_technologies');
    }

    public function minatBidang(): BelongsToMany
    {
        return $this->belongsToMany(MinatBidang::class, 'uesr_minat');
    }

    public function recommendationResults(): HasMany
    {
        return $this->hasMany(RecommendationResult::class)->orderBy('rank');
    }

    public function skillIds(): array
    {
        return $this->skills->pluck('id')->toArray();
    }

    public function technologyIds(): array
    {
        return $this->technologies->pluck('id')->toArray();
    }

    public function minatBidangIds(): array
    {
        return $this->minatBidang->pluck('id')->toArray();
    }
}