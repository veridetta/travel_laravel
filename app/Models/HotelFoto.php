<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HotelFoto extends Model
{
    use HasFactory;
    public function hotels(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }
}
