@props([
    'text' => null,
    'color' => 'gray', // gray, blue, green, red, yellow, purple
    'style' => 'solid' // solid, dashed, dotted
])

@php
    $colors = [
        'gray' => 'border-gray-300 text-gray-500',
        'blue' => 'border-blue-300 text-blue-600',
        'green' => 'border-green-300 text-green-600',
        'red' => 'border-red-300 text-red-600',
        'yellow' => 'border-yellow-300 text-yellow-600',
        'purple' => 'border-purple-300 text-purple-600',
    ];
    
    $styles = [
        'solid' => 'border-solid',
        'dashed' => 'border-dashed',
        'dotted' => 'border-dotted',
    ];
    
    $colorClass = $colors[$color] ?? $colors['gray'];
    $styleClass = $styles[$style] ?? $styles['solid'];
@endphp

<div class="relative my-6">
    <div class="absolute inset-0 flex items-center">
        <div class="w-full border-t {{ $styleClass }} {{ $colorClass }}"></div>
    </div>
    @if($text)
        <div class="relative flex justify-center text-sm">
            <span class="px-2 bg-white {{ $colorClass }}">{{ $text }}</span>
        </div>
    @endif
</div> 