<?php

use App\Models\Board;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use function Laravel\Folio\name;
use function Laravel\Folio\render;

name('boards.show');

render(function (View $view, Board $board) {
    if (! request()->has('token') || request()->get('token') !== $board->token) {
        throw new NotFoundHttpException();
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
	import BentoGrid from "https://cdn.jsdelivr.net/npm/@bentogrid/core@1.1.1/BentoGrid.min.js"

    const myBento = new BentoGrid({
        cellGap: 4,
        minCellWidth: 200,
        @if (isset($board->settings['columns']))
        columns: {{ $board->settings['columns'] }},
        @endif
    })

    @if (isset($board->settings['theme']) && $board->settings['theme'] === 'dark')
    document.documentElement.classList.add('dark')
    @endif
</script>
</x-layouts.app>
