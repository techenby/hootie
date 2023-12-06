<?php

use App\Models\Bin;
use function Laravel\Folio\name;

name('bins.print');

$bins = Bin::whereIn('id', $ids)->get();

?>

<x-layouts.print>
    <div class="grid grid-cols-4">
        @foreach ($bins as $bin)
        <div class="p-4 text-center">
            <span class="flex items-center justify-center mb-4">{!! $bin->qrcode !!}</span>
            <span class="text-lg">{{ $bin->name }}</span>
        </div>
        @endforeach
    </div>
</x-layouts.print>
