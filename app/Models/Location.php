<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bins(): HasMany
    {
        return $this->hasMany(Bin::class);
    }

    public function things(): HasMany
    {
        return $this->hasMany(Thing::class);
    }
}
