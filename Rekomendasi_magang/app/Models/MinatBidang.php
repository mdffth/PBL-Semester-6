<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MinatBidang extends Model
{
    protected $fillable = ['name'];

    public function Perusahaan(): BelongsToMany
    {
        return $this->belongsToMany(Perusahaan::class, 'perusahaan_minat');
    }

    public function UserInput(): BelongsToMany
    {
        return $this->belongsToMany(UserInput::class, 'user_minat');
    }
}
