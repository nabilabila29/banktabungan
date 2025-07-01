<div {{ $attributes->merge([
    'class' => 'bg-white/90 rounded-2xl shadow-lg p-6 md:p-8 border border-gray-100 transition-all duration-300']) }}>
    {{ $slot }}
</div> 