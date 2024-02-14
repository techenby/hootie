<div class="bg-gray-100" data-bento="{{ $data['width'] }}x{{ $data['height'] }}">
    <div class="grid grid-cols-7 gap-1 w-full">
        <button wire:click="prevMonth" class="p-1 text-2xl text-center">&laquo;</button>
        <div class="text-2xl p-1 col-span-5 text-center">{{ $month }}</div>
        <button wire:click="nextMonth" class="p-1 text-2xl text-center">&raquo;</button>

        <div abbr="Sunday" scope="col" title="Sunday" class="text-center text-dimmed">S</div>
        <div abbr="Monday" scope="col" title="Monday" class="text-center text-dimmed">M</div>
        <div abbr="Tuesday" scope="col" title="Tuesday" class="text-center text-dimmed">T</div>
        <div abbr="Wednesday" scope="col" title="Wednesday" class="text-center text-dimmed">W</div>
        <div abbr="Thursday" scope="col" title="Thursday" class="text-center text-dimmed">T</div>
        <div abbr="Friday" scope="col" title="Friday" class="text-center text-dimmed">F</div>
        <div abbr="Saturday" scope="col" title="Saturday" class="text-center text-dimmed">S</div>

        @if ($dayOfWeek !== 0)
        <div class="col-span-{{ $dayOfWeek }}"></div>
        @endif

        @foreach (range(1, $daysInMonth) as $date)
        <div class="text-center {{ $date === $todaysDate ? 'bg-accent rounded-md text-invers' : '' }}">{{ $date }}</div>
        @endforeach
    </div>
</div>
