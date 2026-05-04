<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecommendationResult extends Model
{
    protected $fillable = [
        'user_input_id',
        'perusahaan_id',
        'score_skill',
        'score_technology',
        'score_minat',
        'score_ipk',
        'final_score',
        'rank',
    ];

    protected $casts = [
        'score_skill'       => 'decimal:4',
        'score_technology'  => 'decimal:4',
        'score_minat'    => 'decimal:4',
        'score_ipk'         => 'decimal:4',
        'final_score'       => 'decimal:4',
    ];

    public function userInput(): BelongsTo
    {
        return $this->belongsTo(UserInput::class);
    }

    public function perusahaan(): BelongsTo
    {
        return $this->belongsTo(Perusahaan::class);
    }
}