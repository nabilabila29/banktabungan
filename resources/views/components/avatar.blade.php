@props([
    'src' => null,
    'alt' => 'Avatar',
    'size' => 'md', // sm, md, lg, xl
    'shape' => 'circle', // circle, square, rounded
    'status' => null, // online, offline, away, busy
    'initials' => null
])

@php
    $sizes = [
        'sm' => 'w-8 h-8 text-xs',
        'md' => 'w-10 h-10 text-sm',
        'lg' => 'w-12 h-12 text-base',
        'xl' => 'w-16 h-16 text-lg',
    ];
    
    $shapes = [
        'circle' => 'rounded-full',
        'square' => 'rounded-none',
        'rounded' => 'rounded-lg',
    ];
    
    $statusColors = [
        'online' => 'bg-green-400',
        'offline' => 'bg-gray-400',
        'away' => 'bg-yellow-400',
        'busy' => 'bg-red-400',
    ];
    
    $sizeClass = $sizes[$size] ?? $sizes['md'];
    $shapeClass = $shapes[$shape] ?? $shapes['circle'];
    $statusColor = $statusColors[$status] ?? null;
@endphp

<div class="relative inline-block">
    @if($src)
        <img 
            src="{{ $src }}" 
            alt="{{ $alt }}"
            {{ $attributes->merge([
                'class' => "{$sizeClass} {$shapeClass} object-cover"
            ]) }}
        >
    @elseif($initials)
        <div {{ $attributes->merge([
            'class' => "{$sizeClass} {$shapeClass} bg-blue-500 text-white flex items-center justify-center font-semibold"
        ]) }}>
            {{ $initials }}
        </div>
    @else
        <div {{ $attributes->merge([
            'class' => "{$sizeClass} {$shapeClass} bg-gray-300 flex items-center justify-center"
        ]) }}>
            <i class="fas fa-user text-gray-600"></i>
        </div>
    @endif
    
    @if($status && $statusColor)
        <span class="absolute bottom-0 right-0 block h-3 w-3 {{ $statusColor }} {{ $shapeClass }} ring-2 ring-white"></span>
    @endif
</div> 