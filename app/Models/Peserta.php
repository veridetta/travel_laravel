<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    ///belongs to room
    public function rooms()
    {
        return $this->belongsTo(Room::class);
    }
}
