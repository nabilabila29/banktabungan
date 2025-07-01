@props([
    'label' => '',
    'name',
    'type' => 'text',
    'value' => '',
    'required' => false,
    'placeholder' => '',
    'autofocus' => false,
    'disabled' => false,
    'as' => 'input',
    'min' => null,
    'max' => null,
])
<div class="mb-4">
    @if($label)
        <label for="{{ $name }}" class="block mb-1 font-medium text-gray-700">{{ $label }} @if($required)<span class="text-red-500">*</span>@endif</label>
    @endif
    
    @if($as === 'select')
        <select
            id="{{ $name }}"
            name="{{ $name }}"
            @if($required) required @endif
            @if($autofocus) autofocus @endif
            @if($disabled) disabled @endif
            class="w-full p-3 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 @error($name) border-red-400 @enderror transition"
        >
            {{ $slot }}
        </select>
    @else
        <input
            id="{{ $name }}"
            name="{{ $name }}"
            type="{{ $type }}"
            value="{{ old($name, $value) }}"
            @if($required) required @endif
            @if($autofocus) autofocus @endif
            @if($disabled) disabled @endif
            @if($min) min="{{ $min }}" @endif
            @if($max) max="{{ $max }}" @endif
            placeholder="{{ $placeholder }}"
            class="w-full p-3 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 @error($name) border-red-400 @enderror transition"
        >
    @endif
    
    @error($name)
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
    @enderror
</div> 