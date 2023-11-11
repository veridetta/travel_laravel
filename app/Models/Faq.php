<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Faq extends Model
{
    use HasFactory;
    protected static function booted()
    {
        parent::booted();

        static::creating(function ($page) {
            $page->slug = Str::slug($page->title);
        });
    }
}
