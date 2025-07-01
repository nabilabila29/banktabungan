@props([
    'title',
    'value',
    'icon' => null,
    'color' => 'blue', // blue, green, purple, orange, red
    'trend' => null, // positive, negative, neutral
    'trendValue' => null
])

@php
    $colors = [
        'blue' => 'bg-blue-100 text-blue-600',
        'green' => 'bg-green-100 text-green-600',
        'purple' => 'bg-purple-100 text-purple-600',
        'orange' => 'bg-orange-100 text-orange-600',
        'red' => 'bg-red-100 text-red-600',
    ];
    
    $trendColors = [
        'positive' => 'text-green-600',
        'negative' => 'text-red-600',
        'neutral' => 'text-gray-600',
    ];
    
    $trendIcons = [
        'positive' => 'fas fa-arrow-up',
        'negative' => 'fas fa-arrow-down',
        'neutral' => 'fas fa-minus',
    ];
    
    $colorClass = $colors[$color] ?? $colors['blue'];
    $trendColorClass = $trendColors[$trend] ?? $trendColors['neutral'];
    $trendIcon = $trendIcons[$trend] ?? $trendIcons['neutral'];
@endphp

<x-card class="text-center card-hover">
    <div class="flex flex-col items-center">
        @if($icon)
            <div class="w-12 h-12 {{ $colorClass }} rounded-full flex items-center justify-center mb-3">
                <i class="{{ $icon }} text-xl"></i>
            </div>
        @endif
        
        <div class="text-2xl font-bold text-gray-900 mb-1">{{ $value }}</div>
        <div class="text-gray-600 text-sm mb-2">{{ $title }}</div>
        
        @if($trend && $trendValue)
            <div class="flex items-center {{ $trendColorClass }} text-sm">
                <i class="{{ $trendIcon }} mr-1"></i>
                <span>{{ $trendValue }}</span>
            </div>
        @endif
    </div>
</x-card> 