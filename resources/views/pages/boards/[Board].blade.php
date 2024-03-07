<?php

use function Laravel\Folio\name;

name('boards.show');

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
