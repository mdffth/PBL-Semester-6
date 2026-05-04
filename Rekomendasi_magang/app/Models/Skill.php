<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Skill extends Model
{
    protected $fillable = [
        'name'
    ];

    public function Perusahaan(): BelongsToMany
    {
        return $this->belongsToMany(Perusahaan::class, 'perusahaan_skills');
    } 

    public function UserInput(): BelongsToMany
    {
        return $this->belongsToMany(UserInput::class, 'user_skills');
    }
}
