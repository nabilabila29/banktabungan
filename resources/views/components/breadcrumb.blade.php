@props([
    'items' => []
])

<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
        @foreach($items as $index => $item)
            <li class="inline-flex items-center">
                @if($index > 0)
                    <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                @endif
                
                @if($index === count($items) - 1)
                    <span class="text-sm font-medium text-gray-500">{{ $item['label'] }}</span>
                @else
                    <a href="{{ $item['url'] }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors">
                        @if($index === 0)
                            <i class="fas fa-home mr-2"></i>
                        @endif
                        {{ $item['label'] }}
                    </a>
                @endif
            </li>
        @endforeach
    </ol>
</nav> 