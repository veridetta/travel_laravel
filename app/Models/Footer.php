<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;

    public function page()
    {
        return $this->belongsTo(Pages::class, 'page_id', 'id');
    }
}
