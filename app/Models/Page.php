<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory;

    public function footer()
    {
        return $this->belongsTo(Footer::class);
    }
    protected static function booted()
    {
        parent::booted();

        static::creating(function ($page) {
            $page->slug = Str::slug($page->title);
        });
    }
    public function footers()
    {
        return $this->hasMany(Footer::class, 'page_id', 'id');
    }
    public function scopeHasJob($query, $jobId)
    {
        return $query->where('footer', 'LIKE', '%' . $jobId . '%');
    }
}
