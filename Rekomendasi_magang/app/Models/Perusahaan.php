<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Perusahaan extends Model
{
    use HasFactory;

    protected $table = 'perusahaan';

    protected $fillable = [
        'name',
        'profile_perusahaan',
        'tipe_industri',
        'posisi_magang',
        'min_ipk',
        'job_description',
        'duration_months',
        'status_magang',
        'logo',
        // lokasi
        'kota',
        'provinsi',
        'alamat',
    ];

    protected $casts = [
        'min_ipk' => 'decimal:2',
    ];

    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(
            Skill::class,
            'perusahaan_skills'
        );
    }

    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(
            Technology::class,
            'perusahaan_technologies'
        );
    }

    public function minatBidang(): BelongsToMany
    {
    return $this->belongsToMany(
        MinatBidang::class,
        'perusahaan_posisi'
    );
    }

    public function recommendationResults(): HasMany
    {
        return $this->hasMany(
            RecommendationResult::class
        );
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

    // Di app/Models/Perusahaan.php
public function getLogoUrlAttribute(): string
{
    return $this->logo
        ? asset('storage/' . $this->logo)
        : null;
}
}