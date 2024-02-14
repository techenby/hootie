<x-tile class="flex items-center justify-center" :width="$data['width']" :height="$data['height']">
    <div>
        <p class="text-4xl font-bold mb-2 text-center">{{ now()->timezone($data['timezone'])->format('g:i A') }}</p>
        <p class="text-sm text-center">{{ now()->timezone($data['timezone'])->format('l F jS, Y') }}</p>
    </div>
</x-tile>
