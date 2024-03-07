<?php

use App\Models\Tile;
use Livewire\Volt\Component;

new class extends Component {
    public $data;

    public function with(): array
    {
        return [
            'events' => Tile::whereType("calendar")
                ->whereIn("name", $this->data['emails'])
                ->get()
                ->pluck("data")
                ->flatten(1)
                ->sortBy("start"),
        ];
    }
}; ?>

<x-tile class="overflow-hidden" :width="$data['width']" :height="$data['height']">
    <div class="flex-auto text-sm font-semibold">{{ $data['name'] }}</div>

    <ul class="divide-y divide-gray-200 dark:divide-gray-700 mt-3 overflow-scroll" style="height: calc({{ $data['height'] }} * var(--bento-row-height) - 45px)">
        @foreach ($events as $event)
            <li class="py-1 first:pt-0">
                <div class="text-sm dark:text-gray-200">
                    {{ $event['name'] }}
                </div>
                <div class="text-sm">
                    {{ $event['formatted'] }}
                </div>
            </li>
        @endforeach
    </ul>
</x-tile>
