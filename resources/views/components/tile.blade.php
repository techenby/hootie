@props(['width' => 1, 'height' => 1])
<div {{ $attributes->merge(['class' => 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-400 p-2']) }} style="height: calc({{ $height }} * var(--bento-row-height)) + {{ $height > 1 ? $height * 4 : 0 }}px" data-bento="{{ $width }}x{{ $height }}">
    {{ $slot }}
</div>
