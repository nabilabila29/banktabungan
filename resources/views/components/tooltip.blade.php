@props([
    'text',
    'position' => 'top', // top, bottom, left, right
    'color' => 'dark' // light, dark
])

@php
    $positions = [
        'top' => 'bottom-full left-1/2 transform -translate-x-1/2 mb-2',
        'bottom' => 'top-full left-1/2 transform -translate-x-1/2 mt-2',
        'left' => 'right-full top-1/2 transform -translate-y-1/2 mr-2',
        'right' => 'left-full top-1/2 transform -translate-y-1/2 ml-2',
    ];
    
    $colors = [
        'light' => 'bg-white text-gray-900 border border-gray-200',
        'dark' => 'bg-gray-900 text-white',
    ];
    
    $arrows = [
        'top' => 'top-full left-1/2 transform -translate-x-1/2 border-t-gray-900',
        'bottom' => 'bottom-full left-1/2 transform -translate-x-1/2 border-b-gray-900',
        'left' => 'left-full top-1/2 transform -translate-y-1/2 border-l-gray-900',
        'right' => 'right-full top-1/2 transform -translate-y-1/2 border-r-gray-900',
    ];
    
    $positionClass = $positions[$position] ?? $positions['top'];
    $colorClass = $colors[$color] ?? $colors['dark'];
    $arrowClass = $arrows[$position] ?? $arrows['top'];
@endphp

<div class="relative inline-block group">
    {{ $slot }}
    
    <div class="absolute {{ $positionClass }} z-50 px-3 py-2 text-sm rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 {{ $colorClass }}">
        {{ $text }}
        <div class="absolute w-0 h-0 border-4 border-transparent {{ $arrowClass }}"></div>
    </div>
</div> 