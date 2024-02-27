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

<x-tile :width="$data['width']" :height="$data['height']">
    <div class="flex-auto text-sm font-semibold">{{ $data['name'] }}</div>

    <ul class="divide-y-2 mt-6 max-h-80 overflow-scroll">
        @foreach ($events as $event)
            <li class="py-1 first:pt-0">
                <div class="text-sm">
                    {{ $event['name'] }}
                </div>
                <div class="text-sm">
                    {{ $event['formatted'] }}
                </div>
            </li>
        @endforeach
    </ul>
</x-tile>
