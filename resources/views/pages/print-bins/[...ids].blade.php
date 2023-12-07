<?php

use App\Models\Bin;
use Illuminate\View\View;
use function Laravel\Folio\name;
use function Laravel\Folio\render;

name('bins.print');


render(function (View $view, $ids) {
    $bins = Bin::whereIn('id', $ids)->get();

    return $view->with('bins', $bins);
});

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
    <div class="print:hidden fixed right-0 bottom-0 mb-4 py-2 px-6 rounded-l-full bg-blue-200">
        Print this page then click the back button to go back to the app.
    </div>
</x-layouts.print>
