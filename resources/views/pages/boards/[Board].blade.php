<?php

use App\Models\Board;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use function Laravel\Folio\name;
use function Laravel\Folio\render;

name('boards.show');

render(function (View $view, Board $board) {
    if (! request()->has('token') || request()->get('token') !== $board->token) {
        return response('Not Found', 404);
    }

    return $view;
});

?>

<x-layouts.app>
<div class="bentogrid">
    @foreach ($board->tiles as $tile)
        @if ($tile['data']['type'] === 'livewire')
        @livewire('tiles.' . $tile['type'], ['data' => $tile['data']])
        @else
        <x-dynamic-component :component="'tiles.' . $tile['type']" :data="$tile['data']" />
        @endif
    @endforeach
</div>

<script type="module">
	import BentoGrid from "https://cdn.jsdelivr.net/npm/@bentogrid/core@1.1.1/BentoGrid.min.js";

    const myBento = new BentoGrid({
        cellGap: 4,
        minCellWidth: 200,
    });
</script>
</x-layouts.app>
