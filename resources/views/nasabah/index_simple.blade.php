@extends('layouts.app')

@section('title', 'Data Nasabah')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold text-blue-800 mb-6">Data Nasabah</h1>
    
    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow p-6">
        @if(isset($nasabahs) && $nasabahs->count() > 0)
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b text-left">No</th>
                        <th class="px-6 py-3 border-b text-left">Nama</th>
                        <th class="px-6 py-3 border-b text-left">NIK</th>
                        <th class="px-6 py-3 border-b text-left">Email</th>
                        <th class="px-6 py-3 border-b text-left">Telepon</th>
                        <th class="px-6 py-3 border-b text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($nasabahs as $index => $nasabah)
                    <tr>
                        <td class="px-6 py-4 border-b">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 border-b">{{ $nasabah->nama }}</td>
                        <td class="px-6 py-4 border-b">{{ $nasabah->nik }}</td>
                        <td class="px-6 py-4 border-b">{{ $nasabah->email }}</td>
                        <td class="px-6 py-4 border-b">{{ $nasabah->telepon }}</td>
                        <td class="px-6 py-4 border-b">
                            <a href="{{ route('nasabah.edit', $nasabah->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-500 text-center py-8">Belum ada data nasabah.</p>
        @endif
    </div>
    
    <div class="mt-6">
        <a href="{{ route('nasabah.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Tambah Nasabah
        </a>
    </div>
</div>
@endsection 