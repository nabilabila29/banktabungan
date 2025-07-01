@props([
    'items' => []
])
<div class="flow-root">
    <ul class="-mb-8">
        @foreach($items as $index => $item)
            <li>
                <div class="relative pb-8">
                    @if($index < count($items) - 1)
                        <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                    @endif
                    <div class="relative flex space-x-3">
                        <div>
                            <span class="h-8 w-8 rounded-full flex items-center justify-center ring-8 ring-white {{ $item['color'] ?? 'bg-blue-500' }}">
                                <i class="{{ $item['icon'] ?? 'fas fa-circle' }} text-white text-sm"></i>
                            </span>
                        </div>
                        <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                            <div>
                                <p class="text-sm text-gray-500">
                                    {{ $item['content'] }}
                                </p>
                            </div>
                            <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                <time datetime="{{ $item['datetime'] ?? '' }}">{{ $item['time'] ?? '' }}</time>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div> 