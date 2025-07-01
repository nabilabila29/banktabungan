@props([
    'id' => 'modal',
    'title' => null,
    'size' => 'md', // sm, md, lg, xl
    'closeButton' => true
])

@php
    $sizes = [
        'sm' => 'max-w-md',
        'md' => 'max-w-lg',
        'lg' => 'max-w-2xl',
        'xl' => 'max-w-4xl',
    ];
    
    $sizeClass = $sizes[$size] ?? $sizes['md'];
@endphp

<div id="{{ $id }}" class="fixed inset-0 z-50 hidden">
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" onclick="closeModal('{{ $id }}')"></div>
    
    <!-- Modal -->
    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4">
            <div class="relative w-full {{ $sizeClass }} transform overflow-hidden rounded-2xl bg-white shadow-xl transition-all">
                <!-- Header -->
                @if($title || $closeButton)
                    <div class="flex items-center justify-between border-b border-gray-200 px-6 py-4">
                        @if($title)
                            <h3 class="text-lg font-semibold text-gray-900">{{ $title }}</h3>
                        @endif
                        @if($closeButton)
                            <button 
                                type="button" 
                                onclick="closeModal('{{ $id }}')"
                                class="rounded-lg p-1 text-gray-400 hover:bg-gray-100 hover:text-gray-600 transition-colors"
                            >
                                <i class="fas fa-times text-xl"></i>
                            </button>
                        @endif
                    </div>
                @endif
                
                <!-- Content -->
                <div class="px-6 py-4">
                    {{ $slot }}
                </div>
                
                <!-- Footer -->
                @if(isset($footer))
                    <div class="flex items-center justify-end gap-3 border-t border-gray-200 px-6 py-4">
                        {{ $footer }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function openModal(id) {
    document.getElementById(id).classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeModal(id) {
    document.getElementById(id).classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Close modal on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        const modals = document.querySelectorAll('[id$="modal"]');
        modals.forEach(modal => {
            if (!modal.classList.contains('hidden')) {
                closeModal(modal.id);
            }
        });
    }
});
</script>
@endpush 