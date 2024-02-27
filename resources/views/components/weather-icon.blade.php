@props(['id' => 800])

@php
$component = match($id) {
    800 => 'icons.sun',
    801 => 'icons.sun-behind-small-cloud',
    802 => 'icons.sun-behind-large-cloud',
    803, 804 => 'icons.cloud',
    Illuminate\Support\Str::startsWith($id, 3) => 'icons.cloud-with-rain',
    Illuminate\Support\Str::startsWith($id, 5) => 'icons.sun-behind-rain-cloud',
    Illuminate\Support\Str::startsWith($id, 2) => 'icons.cloud-with-lightning-and-rain',
    Illuminate\Support\Str::startsWith($id, 6) => 'icons.snow-flake',
    Illuminate\Support\Str::startsWith($id, 7) => 'icons.fog',
    default => 'icons.sun',
}
@endphp

<x-dynamic-component :class="$attributes->get('class')" :component="$component" />
