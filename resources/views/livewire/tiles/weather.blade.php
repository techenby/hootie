<?php

use Livewire\Volt\Component;

new class extends Component {
    public $data;
}; ?>

<x-tile :width="$data['width']" :height="$data['height']">
    <p>Plainfield</p>
    <div class="w-full mt-2 flex justify-between">
        <div class="text-5xl">31°</div>
        <div>
            <p>H: 41°</p>
            <p>L: 28°</p>
        </div>
    </div>

    <div class="space-y-2 mt-4">
        <div class="w-full flex justify-between">
            <div class="flex">
                <p class="w-12">Wed</p>
                <p>☀️</p>
            </div>
            <div class="flex">
                <p class="text-gray-700">25</p>
                <p class="w-9 text-right">45°</p>
            </div>
        </div>
        <div class="w-full flex justify-between">
            <div class="flex">
                <p class="w-12">Wed</p>
                <p>☀️</p>
            </div>
            <div class="flex">
                <p class="text-gray-700">25</p>
                <p class="w-9 text-right">45°</p>
            </div>
        </div>
        <div class="w-full flex justify-between">
            <div class="flex">
                <p class="w-12">Wed</p>
                <p>☀️</p>
            </div>
            <div class="flex">
                <p class="text-gray-700">25</p>
                <p class="w-9 text-right">45°</p>
            </div>
        </div>
        <div class="w-full flex justify-between">
            <div class="flex">
                <p class="w-12">Wed</p>
                <p>☀️</p>
            </div>
            <div class="flex">
                <p class="text-gray-700">25</p>
                <p class="w-9 text-right">45°</p>
            </div>
        </div>
    </div>
</x-tile>
