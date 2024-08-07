<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tile extends Model
{
    public $table = 'board_tiles';

    public $guarded = [];

    protected function casts(): array
    {
        return [
            'data' => 'array',
        ];
    }
}
