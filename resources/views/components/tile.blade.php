@props(['width' => 1, 'height' => 1])
<div {{ $attributes->merge(['class' => 'bg-gray-100 p-2']) }} data-bento="{{ $width }}x{{ $height }}">
    {{ $slot }}
</div>
