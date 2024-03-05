<x-tile width="2" height="1">
    <div class="w-full flex items-start justify-between">
        <p class="text-sm font-semibold">{{ $name }}</p>
    </div>

    <div class="w-full mt-2 flex items-end justify-between">
        <div class="flex space-x-4 items-center">
            <div class="text-4xl dark:text-gray-200">{{ round($weather['current']['temp']) }}°</div>
            <x-weather-icon class="size-8 dark:text-gray-200" :id="$weather['current']['weather'][0]['id']" />
        </div>
        <div class="flex">
            <p class="text-gray-500 dark:text-gray-400">{{ round($weather['daily'][0]['temp']['min']) }}</p>
            <p class="w-9 text-right dark:text-gray-200">{{ round($weather['daily'][0]['temp']['max']) }}°</p>
        </div>
    </div>

    <div class="grid grid-cols-7 gap-4 mt-2">
        @foreach ($weather['daily'] as $index => $day)
        @if ($index > 0)
        <div class="w-full flex flex-col items-center justify-between space-y-2">
            <p>{{ Carbon\Carbon::parse($day['dt'], $weather['timezone'])->format('D') }}</p>
            <p class="dark:text-gray-200">{{ round($day['temp']['max']) }}°</p>
            <x-weather-icon class="size-6" :id="$day['weather'][0]['id']" />
            <p class="text-gray-500 dark:text-gray-400">{{ round($day['temp']['min']) }}</p>
        </div>
        @endif
        @endforeach
    </div>
</x-tile>
