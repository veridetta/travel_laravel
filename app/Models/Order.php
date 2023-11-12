<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function travel()
    {
      return $this->belongsTo(Travel::class, 'travel_id', 'id');
    }
    public function users()
    {
      return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function agents()
    {
      return $this->belongsTo(Agent::class, 'agent_id', 'id');
    }
    public function rooms()
    {
      return $this->hasMany(Room::class, 'order_id', 'id');
    }
    //pesertas
    public function pesertas()
    {
      return $this->hasMany(Peserta::class, 'order_id', 'id');
    }
}
