<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Thing extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bin(): BelongsTo
    {
        return $this->belongsTo(Bin::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
