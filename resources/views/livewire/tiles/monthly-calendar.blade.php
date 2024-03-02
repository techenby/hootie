<?php

use Livewire\Volt\Component;

new class extends Component {
    public $data;
    public $carbon;

    public function mount()
    {
        $this->carbon = now($this->data['timezone']);
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

<x-tile class="text-center" :width="$data['width']" :height="$data['height']">
    <div class="flex items-center">
        <button wire:click="prevMonth" type="button" class="-m-1.5 flex flex-none items-center justify-center p-1.5 text-gray-400 hover:text-gray-500">
            <span class="sr-only">Previous month</span>
            <x-heroicon-o-chevron-left class="size-5" />
        </button>
        <div class="flex-auto text-sm font-semibold">{{ $month }}</div>
        <button wire:click="nextMonth" type="button" class="-m-1.5 flex flex-none items-center justify-center p-1.5 text-gray-400 hover:text-gray-500">
            <span class="sr-only">Next month</span>
            <x-heroicon-o-chevron-right class="h-5 w-5" />
        </button>
    </div>
    <div class="grid grid-cols-7 gap-1 mt-3 text-xs text-gray-500 dark:text-gray-400">
        <div abbr="Sunday" scope="col" title="Sunday">S</div>
        <div abbr="Monday" scope="col" title="Monday">M</div>
        <div abbr="Tuesday" scope="col" title="Tuesday">T</div>
        <div abbr="Wednesday" scope="col" title="Wednesday">W</div>
        <div abbr="Thursday" scope="col" title="Thursday">T</div>
        <div abbr="Friday" scope="col" title="Friday">F</div>
        <div abbr="Saturday" scope="col" title="Saturday">S</div>
    </div>
    <div class="isolate mt-2 grid grid-cols-7 gap-px text-sm ">
        @if ($dayOfWeek !== 0)
        <!-- could be col-span-1 col-span-2 col-span-3 col-span-4 col-span-5 col-span-6 -->
        <div class="col-span-{{ $dayOfWeek }}"></div>
        @endif

        @foreach (range(1, $daysInMonth) as $date)
        <div class="{{ $date === $todaysDate ? 'rounded-md border border-gray-500 dark:border-gray-200 dark:text-gray-200' : '' }}">
            <span class="mx-auto flex size-5 items-center justify-center">{{ $date }}</span>
        </div>
        @endforeach
    </div>
</x-tile>
