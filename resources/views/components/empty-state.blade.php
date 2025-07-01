@props([
    'title' => 'Tidak ada data',
    'description' => 'Belum ada data yang tersedia',
    'icon' => 'fas fa-inbox',
    'action' => null,
    'actionText' => null
])

<div class="text-center py-12">
    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
        <i class="{{ $icon }} text-2xl text-gray-400"></i>
    </div>
    
    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $title }}</h3>
    <p class="text-gray-500 mb-6">{{ $description }}</p>
    
    @if($action && $actionText)
        <a href="{{ $action }}" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-semibold">
            <i class="fas fa-plus mr-2"></i>{{ $actionText }}
        </a>
    @endif
    
    {{ $slot }}
</div> 