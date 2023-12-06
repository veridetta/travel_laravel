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
    protected $casts = [
      'maskapai' => 'array',
    ];
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class,'travel_id');
    }
    public function travel_banners(): HasMany
    {
        return $this->hasMany(TravelBanner::class,'travel_id');
    }
    public function prices(): HasMany
    {
        return $this->hasMany(Price::class,'travel_id');
    }
    public function hotels(): HasMany
    {
        return $this->hasMany(Hotel::class,'travel_id');
    }
    public function plans(): HasMany
    {
        return $this->hasMany(Plan::class,'travel_id');
    }
    public function syarats(): HasMany
    {
        return $this->hasMany(Syarat::class,'travel_id');
    }
    protected static function booted()
    {
        parent::booted();

        static::creating(function ($travel) {
            $travel->slug = Str::slug($travel->title);
            $travel->user_id = auth()->user()->id;
        });
    }
    public function maskapais()
    {
      return $this->belongsTo(Maskapai::class, 'maskapai', 'id');
    }
    public function pesertas()
{
    return $this->hasMany(Peserta::class, 'travel_id');
}
  //user
  public function users()
  {
      return $this->belongsTo(User::class, 'user_id');
  }
}
