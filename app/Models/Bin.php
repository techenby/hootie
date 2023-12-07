<?php

namespace App\Models;

use App\Filament\Resources\BinResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Bin extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function things(): HasMany
    {
        return $this->hasMany(Thing::class);
    }

    public function getQrcodeAttribute()
    {
        return QrCode::size(150)->generate(BinResource::getUrl('view', ['record' => $this]));
    }
}
