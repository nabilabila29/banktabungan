@props([
    'items' => [],
    'collapsed' => false
])
<div class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transform transition-transform duration-300 {{ $collapsed ? '-translate-x-full' : 'translate-x-0' }}">
    <div class="flex items-center justify-between h-16 px-4 border-b border-gray-200">
        <div class="flex items-center">
            <img src="https://img.icons8.com/color/48/000000/bank-building.png" alt="Logo" class="w-8 h-8 mr-3">
            <span class="text-xl font-bold text-gray-900">Bank Kita</span>
        </div>
        <button onclick="toggleSidebar()" class="p-2 rounded-md text-gray-400 hover:text-gray-600 hover:bg-gray-100">
            <i class="fas fa-times text-lg"></i>
        </button>
    </div>
    
    <nav class="mt-5 px-2">
        <div class="space-y-1">
            @foreach($items as $item)
                <a href="{{ $item['url'] ?? '#' }}" 
                   class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->url() == url($item['url'] ?? '#') ? 'bg-blue-100 text-blue-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                    <i class="{{ $item['icon'] ?? 'fas fa-circle' }} mr-3 text-lg"></i>
                    {{ $item['label'] }}
                </a>
            @endforeach
        </div>
    </nav>
    
    <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-200">
        <div class="flex items-center">
            <div class="w-8 h-8 bg-gray-300 rounded-full mr-3"></div>
            <div>
                <p class="text-sm font-medium text-gray-900">Admin User</p>
                <p class="text-xs text-gray-500">admin@bankkita.com</p>
            </div>
        </div>
    </div>
</div>

<script>
function toggleSidebar() {
    const sidebar = document.querySelector('[data-sidebar]');
    if (sidebar) {
        sidebar.classList.toggle('-translate-x-full');
    }
}

// Close sidebar when clicking outside
document.addEventListener('click', function(e) {
    const sidebar = document.querySelector('[data-sidebar]');
    const toggleBtn = document.querySelector('[data-sidebar-toggle]');
    
    if (sidebar && !sidebar.contains(e.target) && !toggleBtn?.contains(e.target)) {
        sidebar.classList.add('-translate-x-full');
    }
});
</script> 