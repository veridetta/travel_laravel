<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Agent extends Model
{
    use HasFactory;
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    //review
    public function reviews()
    {
        return $this->hasMany(Review::class, 'agent_id');
    }
    //order
    public function orders()
    {
        return $this->hasMany(Order::class, 'agent_id');
    }
}
