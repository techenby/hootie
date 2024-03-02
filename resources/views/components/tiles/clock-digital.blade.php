<x-tile class="flex items-center justify-center relative" :width="$data['width']" :height="$data['height']">
    <div class="flex-auto text-sm font-semibold absolute top-0 left-0 p-2">{{ now()->timezone($data['timezone'])->format('T') }}</div>
    <div>
        <p class="text-4xl font-bold mb-2 text-center dark:text-gray-200">{{ now()->timezone($data['timezone'])->format('g:i A') }}</p>
        <p class="text-sm text-center">{{ now()->timezone($data['timezone'])->format('l F jS, Y') }}</p>
    </div>
</x-tile>
