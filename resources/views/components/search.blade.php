@props([
    'placeholder' => 'Cari...',
    'name' => 'search',
    'value' => null
])

<div class="relative">
    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
        <i class="fas fa-search text-gray-400"></i>
    </div>
    <input 
        type="text" 
        name="{{ $name }}"
        value="{{ $value ?? request($name) }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge([
            'class' => 'w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200'
        ]) }}
    >
    @if($value || request($name))
        <button 
            type="button" 
            onclick="clearSearch(this)"
            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors"
        >
            <i class="fas fa-times"></i>
        </button>
    @endif
</div>

@push('scripts')
<script>
function clearSearch(button) {
    const input = button.parentElement.querySelector('input');
    input.value = '';
    input.focus();
    
    // Trigger form submission if parent form exists
    const form = input.closest('form');
    if (form) {
        form.submit();
    }
}
</script>
@endpush 