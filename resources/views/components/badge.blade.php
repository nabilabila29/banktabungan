@props([
    'color' => 'primary', // primary, secondary, success, danger, warning, info
    'size' => 'md', // sm, md, lg
    'rounded' => true
])

@php
    $colors = [
        'primary' => 'bg-blue-100 text-blue-800',
        'secondary' => 'bg-gray-100 text-gray-800',
        'success' => 'bg-green-100 text-green-800',
        'danger' => 'bg-red-100 text-red-800',
        'warning' => 'bg-yellow-100 text-yellow-800',
        'info' => 'bg-blue-100 text-blue-800',
    ];
    
    $sizes = [
        'sm' => 'px-2 py-1 text-xs',
        'md' => 'px-2.5 py-0.5 text-xs',
        'lg' => 'px-3 py-1 text-sm',
    ];
    
    $colorClass = $colors[$color] ?? $colors['primary'];
    $sizeClass = $sizes[$size] ?? $sizes['md'];
    $roundedClass = $rounded ? 'rounded-full' : 'rounded';
@endphp

<span {{ $attributes->merge([
    'class' => "inline-flex items-center font-medium {$colorClass} {$sizeClass} {$roundedClass}"
]) }}>
    {{ $slot }}
</span> 