@props([
    'value' => 0,
    'max' => 100,
    'size' => 'md', // sm, md, lg
    'color' => 'blue', // blue, green, red, yellow, purple
    'showLabel' => true,
    'animated' => false
])

@php
    $percentage = min(100, max(0, ($value / $max) * 100));
    
    $sizes = [
        'sm' => 'h-2',
        'md' => 'h-3',
        'lg' => 'h-4',
    ];
    
    $colors = [
        'blue' => 'bg-blue-600',
        'green' => 'bg-green-600',
        'red' => 'bg-red-600',
        'yellow' => 'bg-yellow-600',
        'purple' => 'bg-purple-600',
    ];
    
    $sizeClass = $sizes[$size] ?? $sizes['md'];
    $colorClass = $colors[$color] ?? $colors['blue'];
    $animatedClass = $animated ? 'animate-pulse' : '';
@endphp

<div class="w-full">
    @if($showLabel)
        <div class="flex justify-between items-center mb-2">
            <span class="text-sm font-medium text-gray-700">Progress</span>
            <span class="text-sm font-medium text-gray-700">{{ round($percentage, 1) }}%</span>
        </div>
    @endif
    
    <div class="w-full bg-gray-200 rounded-full {{ $sizeClass }}">
        <div 
            class="{{ $colorClass }} {{ $sizeClass }} rounded-full transition-all duration-500 {{ $animatedClass }}"
            style="width: {{ $percentage }}%"
        ></div>
    </div>
    
    @if($showLabel && ($value !== null || $max !== 100))
        <div class="text-xs text-gray-500 mt-1">
            {{ $value }} dari {{ $max }}
        </div>
    @endif
</div> 