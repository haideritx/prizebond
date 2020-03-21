<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Denomination extends Model
{
    public function draw_prizeBonds(): HasMany
    {
        return $this->hasMany(PrizeBond::class);
    }

    public function user_prizeBonds(): HasMany
    {
        return $this->hasMany(UserPrizeBond::class);
    }
}
