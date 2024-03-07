<x-tile width="1" height="2">
    <div class="w-full flex items-start justify-between">
        <p class="text-sm font-semibold">{{ $name }}</p>
        <x-weather-icon class="size-6 dark:text-gray-200" :id="$weather['current']['weather'][0]['id']" />
    </div>

    <div class="w-full mt-2 flex items-end justify-between">
        <div class="text-4xl dark:text-gray-200">{{ round($weather['current']['temp']) }}°</div>
        <div class="flex">
            <p class="text-gray-500 dark:text-gray-400">{{ round($weather['daily'][0]['temp']['min']) }}</p>
            <p class="w-9 text-right dark:text-gray-200">{{ round($weather['daily'][0]['temp']['max']) }}°</p>
        </div>
    </div>

    <div class="space-y-2 mt-2">
        @foreach ($weather['daily'] as $index => $day)
        @if ($index > 0)
        <div class="w-full flex justify-between text-sm">
            <div class="flex">
                <p class="w-12">{{ Carbon\Carbon::parse($day['dt'], $weather['timezone'])->format('D') }}</p>
                <x-weather-icon class="size-5" :id="$day['weather'][0]['id']" />
            </div>
            <div class="flex">
                <p class="text-gray-500 dark:text-gray-400">{{ round($day['temp']['min']) }}</p>
                <p class="w-9 text-right dark:text-gray-200">{{ round($day['temp']['max']) }}°</p>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</x-tile>
