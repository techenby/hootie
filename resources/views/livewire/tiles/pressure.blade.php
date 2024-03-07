<?php

use App\Models\Tile;
use Livewire\Volt\Component;

new class extends Component {
    public $data;

    public function with(): array
    {
        return [
            'pressures' => Tile::whereType('pressure')->whereName($this->data['zip'])->first()->data,
        ];
    }
}; ?>

<x-tile :width="$data['width']" :height="$data['height']">
    <p class="text-sm font-semibold">{{ $data['name'] }}</p>

    <dl class="divide-y divide-gray-200 dark:divide-gray-700 mt-3">
        @foreach ($pressures as $pressure)
        <div class="py-1 first:pt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-400">{{ $pressure['label'] }}</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-700 dark:text-gray-200 sm:col-span-2 sm:mt-0">{{ $pressure['value'] }} hPa</dd>
        </div>
        @endforeach
    </dl>
</x-tile>
