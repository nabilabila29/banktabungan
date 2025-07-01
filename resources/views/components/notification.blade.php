@props([
    'type' => 'info', // success, error, warning, info
    'title' => null,
    'dismissible' => true,
    'autoHide' => false,
    'duration' => 5000
])

@php
    $types = [
        'success' => [
            'bg' => 'bg-green-50',
            'border' => 'border-green-200',
            'icon' => 'fas fa-check-circle',
            'iconColor' => 'text-green-400',
            'titleColor' => 'text-green-800',
            'textColor' => 'text-green-700'
        ],
        'error' => [
            'bg' => 'bg-red-50',
            'border' => 'border-red-200',
            'icon' => 'fas fa-exclamation-circle',
            'iconColor' => 'text-red-400',
            'titleColor' => 'text-red-800',
            'textColor' => 'text-red-700'
        ],
        'warning' => [
            'bg' => 'bg-yellow-50',
            'border' => 'border-yellow-200',
            'icon' => 'fas fa-exclamation-triangle',
            'iconColor' => 'text-yellow-400',
            'titleColor' => 'text-yellow-800',
            'textColor' => 'text-yellow-700'
        ],
        'info' => [
            'bg' => 'bg-blue-50',
            'border' => 'border-blue-200',
            'icon' => 'fas fa-info-circle',
            'iconColor' => 'text-blue-400',
            'titleColor' => 'text-blue-800',
            'textColor' => 'text-blue-700'
        ]
    ];
    
    $config = $types[$type] ?? $types['info'];
@endphp

<div 
    id="notification-{{ uniqid() }}"
    class="fixed top-4 right-4 z-50 max-w-sm w-full {{ $config['bg'] }} {{ $config['border'] }} border rounded-lg shadow-lg p-4 transform transition-all duration-300 translate-x-full"
    x-data="{ show: false }"
    x-show="show"
    x-init="
        show = true;
        @if($autoHide)
            setTimeout(() => {
                show = false;
                setTimeout(() => $el.remove(), 300);
            }, {{ $duration }});
        @endif
    "
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="transform translate-x-full"
    x-transition:enter-end="transform translate-x-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="transform translate-x-0"
    x-transition:leave-end="transform translate-x-full"
>
    <div class="flex items-start">
        <div class="flex-shrink-0">
            <i class="{{ $config['icon'] }} {{ $config['iconColor'] }} text-lg"></i>
        </div>
        
        <div class="ml-3 flex-1">
            @if($title)
                <p class="text-sm font-medium {{ $config['titleColor'] }}">{{ $title }}</p>
            @endif
            <div class="text-sm {{ $config['textColor'] }}">
                {{ $slot }}
            </div>
        </div>
        
        @if($dismissible)
            <div class="ml-4 flex-shrink-0">
                <button 
                    type="button" 
                    onclick="dismissNotification(this)"
                    class="inline-flex text-gray-400 hover:text-gray-600 focus:outline-none focus:text-gray-600 transition-colors"
                >
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
function dismissNotification(button) {
    const notification = button.closest('[id^="notification-"]');
    notification.style.transform = 'translateX(100%)';
    setTimeout(() => {
        notification.remove();
    }, 300);
}

// Auto-dismiss notifications after 5 seconds
document.addEventListener('DOMContentLoaded', function() {
    const notifications = document.querySelectorAll('[id^="notification-"]');
    notifications.forEach(notification => {
        setTimeout(() => {
            if (notification.parentElement) {
                notification.style.transform = 'translateX(100%)';
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }
        }, 5000);
    });
});
</script>
@endpush 