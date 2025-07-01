@extends('layouts.app')

@section('title', 'Test Nasabah')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold text-blue-800">Test Halaman Nasabah</h1>
    <p class="mt-4 text-gray-600">Jika Anda melihat halaman ini, berarti view berfungsi dengan baik.</p>
    
    <div class="mt-8 p-4 bg-green-100 border border-green-400 rounded">
        <h2 class="text-lg font-semibold text-green-800">Status:</h2>
        <ul class="mt-2 text-green-700">
            <li>✓ Layout app.blade.php berfungsi</li>
            <li>✓ Route nasabah berfungsi</li>
            <li>✓ Controller berfungsi</li>
        </ul>
    </div>
    
    <div class="mt-4">
        <a href="{{ route('nasabah.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Kembali ke Halaman Nasabah
        </a>
    </div>
</div>
@endsection 