@props(['width' => 1, 'height' => 1])
<div {{ $attributes->merge(['class' => 'bg-white p-2']) }} data-bento="{{ $width }}x{{ $height }}">
    {{ $slot }}
</div>
