<?php

use Livewire\Volt\Component;

new class extends Component {
    public $data;

    public function with(): array
    {
        return [
            //
        ];
    }
}; ?>

<x-tile :width="$data['width']" :height="$data['height']">
    <div>{{ $data['name'] }}</div>
</x-tile>
