@props([
    'striped' => true,
    'hover' => true,
    'bordered' => false,
    'responsive' => true
])

@php
    $classes = 'w-full';
    
    if ($striped) {
        $classes .= ' divide-y divide-gray-200';
    }
    
    if ($bordered) {
        $classes .= ' border border-gray-200';
    }
@endphp

@if($responsive)
    <div class="overflow-x-auto">
@endif

<table {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</table>

@if($responsive)
    </div>
@endif

@push('styles')
<style>
    @if($striped)
        tbody tr:nth-child(even) {
            background-color: #f9fafb;
        }
    @endif
    
    @if($hover)
        tbody tr:hover {
            background-color: #f3f4f6;
        }
    @endif
</style>
@endpush 