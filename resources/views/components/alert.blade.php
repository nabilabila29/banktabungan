@props([
    'type' => 'success', // success, error, info, warning
    'dismissible' => false
])
@php
    $color = match($type) {
        'success' => 'bg-green-100 border-green-500 text-green-700',
        'error' => 'bg-red-100 border-red-500 text-red-700',
        'info' => 'bg-blue-100 border-blue-500 text-blue-700',
        'warning' => 'bg-yellow-100 border-yellow-500 text-yellow-700',
        default => 'bg-gray-100 border-gray-400 text-gray-700',
    };
@endphp
<div class="{{ $color }} border-l-4 p-4 mb-4 rounded-lg shadow flex items-start justify-between">
    <div>{{ $slot }}</div>
    @if($dismissible)
        <button type="button" onclick="this.parentElement.remove()" class="ml-4 text-xl leading-none">&times;</button>
    @endif
</div> 