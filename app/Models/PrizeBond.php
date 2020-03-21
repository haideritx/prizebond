<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PrizeBond extends Model
{
    public function denomination(): BelongsTo
    {
        return $this->belongsTo(Denomination::class);
    }
}
