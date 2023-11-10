<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use App\Models\Maskapai;


class Travel extends Model
{
    use HasFactory;
    public function travelBanners(): HasMany
    {
        return $this->hasMany(TravelBanner::class);
    }
    public function prices(): HasMany
    {
        return $this->hasMany(Price::class);
    }
    protected static function booted()
    {
        parent::booted();

        static::creating(function ($travel) {
            $travel->slug = Str::slug($travel->title);
        });
    }
    public function maskapais()
    {
      return $this->belongsTo(Maskapai::class, 'maskapai', 'id');
    }
}
