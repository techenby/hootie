<?php

use Livewire\Volt\Component;

new class extends Component {
    public $data;
    public $carbon;

    public function mount()
    {
        $this->carbon = now();
    }

    public function with(): array
    {
        return [
            'daysInMonth' => $this->carbon->daysInMonth,
            'dayOfWeek' => $this->carbon->copy()->startOfMonth()->dayOfWeek,
            'month' => $this->carbon->englishMonth,
            'todaysDate' => $this->carbon->month === now()->month ? $this->carbon->day : null,
        ];
    }

    public function nextMonth()
    {
        $this->carbon->addMonth();
    }

    public function prevMonth()
    {
        $this->carbon->subMonth();
    }
}; ?>

<x-tile class="grid grid-cols-7 gap-1" :width="$data['width']" :height="$data['height']">
    <button wire:click="prevMonth" class="p-1 text-2xl text-center">&laquo;</button>
    <div class="text-2xl p-1 col-span-5 text-center">{{ $month }}</div>
    <button wire:click="nextMonth" class="p-1 text-2xl text-center">&raquo;</button>

    <div abbr="Sunday" scope="col" title="Sunday" class="text-center text-gray-700">S</div>
    <div abbr="Monday" scope="col" title="Monday" class="text-center text-gray-700">M</div>
    <div abbr="Tuesday" scope="col" title="Tuesday" class="text-center text-gray-700">T</div>
    <div abbr="Wednesday" scope="col" title="Wednesday" class="text-center text-gray-700">W</div>
    <div abbr="Thursday" scope="col" title="Thursday" class="text-center text-gray-700">T</div>
    <div abbr="Friday" scope="col" title="Friday" class="text-center text-gray-700">F</div>
    <div abbr="Saturday" scope="col" title="Saturday" class="text-center text-gray-700">S</div>

    @if ($dayOfWeek !== 0)
    <div class="col-span-{{ $dayOfWeek }}"></div>
    @endif

    @foreach(range(1, $daysInMonth) as $date)
    <div class="text-center {{ $date === $todaysDate ? 'rounded-md' : ''}}"
        @style([
            'background-color: ' . $data['highlight'] => $date === $todaysDate,
        ])
    >{{ $date }}</div>
    @endforeach
</x-tile>
