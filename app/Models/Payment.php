<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    public function metode_pembayarans()
    {
      return $this->belongsTo(MetodePembayaran::class, 'direct', 'id');
    }
}
