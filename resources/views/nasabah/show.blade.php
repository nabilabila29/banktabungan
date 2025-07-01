@extends('layouts.app')

@section('title', 'Detail Nasabah - Bank Kita')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-8">
    <div class="max-w-4xl mx-auto px-4">
        <!-- Header Section -->
        <div class="mb-8 animate-fade-in">
            <div class="flex items-center mb-6">
                <a href="{{ route('nasabah.index') }}" class="mr-4 p-2 bg-white rounded-lg shadow-sm hover:shadow-md transition">
                    <i class="fas fa-arrow-left text-blue-600"></i>
                </a>
                <div class="flex-1">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900">Detail Nasabah</h1>
                    <p class="text-gray-600 mt-1">Informasi lengkap nasabah bank</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('nasabah.edit', $nasabah->id) }}" 
                       class="inline-flex items-center px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition font-semibold">
                        <i class="fas fa-edit mr-2"></i>
                        Edit
                    </a>
                </div>
            </div>
        </div>

        <!-- Alert Messages -->
        @if (session('success'))
            <x-alert type="success" dismissible class="mb-6">
                {{ session('success') }}
            </x-alert>
        @endif

        @if (session('error'))
            <x-alert type="error" dismissible class="mb-6">
                {{ session('error') }}
            </x-alert>
        @endif

        <!-- Profile Card -->
        <div class="animate-slide-up">
            <x-card class="mb-8">
                <div class="flex items-center mb-8">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mr-6">
                        <i class="fas fa-user text-3xl text-blue-600"></i>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">{{ $nasabah->nama }}</h2>
                        <p class="text-gray-600 text-lg">Nasabah Bank Kita</p>
                        <div class="flex items-center mt-2">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                <i class="fas fa-check-circle mr-1"></i>Aktif
                            </span>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Personal Information -->
                    <div class="bg-blue-50 rounded-xl p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-user text-white text-sm"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Informasi Pribadi</h3>
                        </div>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Nama Lengkap</label>
                                <p class="text-gray-900 font-medium">{{ $nasabah->nama }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">NIK</label>
                                <p class="text-gray-900 font-medium">{{ $nasabah->nik }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Email</label>
                                <p class="text-gray-900 font-medium">{{ $nasabah->email }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Nomor Telepon</label>
                                <p class="text-gray-900 font-medium">{{ $nasabah->telepon }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Address Information -->
                    <div class="bg-purple-50 rounded-xl p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 bg-purple-600 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-map-marker-alt text-white text-sm"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Alamat</h3>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Alamat Lengkap</label>
                            <p class="text-gray-900 font-medium">{{ $nasabah->alamat }}</p>
                        </div>
                    </div>
                </div>

                <!-- Account Information -->
                @if($nasabah->rekening)
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <div class="bg-green-50 border border-green-200 rounded-xl p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-credit-card text-white text-sm"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Informasi Rekening</h3>
                        </div>
                        <div class="flex items-center">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-green-800 mb-1">Rekening Aktif</p>
                                <p class="text-sm text-green-600">Jenis: {{ ucfirst($nasabah->rekening->jenis) }} | Saldo: Rp {{ number_format($nasabah->rekening->setor_awal, 0, ',', '.') }}</p>
                            </div>
                            <a href="{{ route('rekening.show', $nasabah->rekening->id) }}" 
                               class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition text-sm font-semibold">
                                <i class="fas fa-eye mr-2"></i>Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                @else
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 bg-yellow-600 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-exclamation-triangle text-white text-sm"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Informasi Rekening</h3>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-yellow-800 mb-1">Belum Memiliki Rekening</p>
                                <p class="text-sm text-yellow-600">Nasabah ini belum membuka rekening</p>
                            </div>
                            <a href="{{ route('rekening.create') }}" 
                               class="inline-flex items-center px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition text-sm font-semibold">
                                <i class="fas fa-plus mr-2"></i>Buka Rekening
                            </a>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Timestamps -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-500">
                        <div class="flex items-center">
                            <i class="fas fa-calendar-plus text-blue-500 mr-2"></i>
                            <span class="font-medium">Dibuat pada:</span> {{ $nasabah->created_at->format('d M Y H:i') }}
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-calendar-check text-green-500 mr-2"></i>
                            <span class="font-medium">Terakhir diperbarui:</span> {{ $nasabah->updated_at->format('d M Y H:i') }}
                        </div>
                    </div>
                </div>
            </x-card>
        </div>

        <!-- Action Cards -->
        <div class="grid md:grid-cols-3 gap-6 animate-slide-up">
            <a href="{{ route('nasabah.edit', $nasabah->id) }}" class="group">
                <x-card class="text-center card-hover h-full">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-yellow-200 transition-colors">
                        <i class="fas fa-edit text-2xl text-yellow-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Edit Data</h3>
                    <p class="text-gray-600 text-sm">Perbarui informasi nasabah</p>
                </x-card>
            </a>
            
            @if(!$nasabah->rekening)
            <a href="{{ route('rekening.create') }}" class="group">
                <x-card class="text-center card-hover h-full">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-green-200 transition-colors">
                        <i class="fas fa-credit-card text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Buka Rekening</h3>
                    <p class="text-gray-600 text-sm">Buat rekening baru untuk nasabah</p>
                </x-card>
            </a>
            @else
            <a href="{{ route('rekening.show', $nasabah->rekening->id) }}" class="group">
                <x-card class="text-center card-hover h-full">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-blue-200 transition-colors">
                        <i class="fas fa-eye text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Lihat Rekening</h3>
                    <p class="text-gray-600 text-sm">Detail rekening nasabah</p>
                </x-card>
            </a>
            @endif
            
            <a href="{{ route('nasabah.index') }}" class="group">
                <x-card class="text-center card-hover h-full">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-gray-200 transition-colors">
                        <i class="fas fa-arrow-left text-2xl text-gray-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Kembali</h3>
                    <p class="text-gray-600 text-sm">Ke daftar nasabah</p>
                </x-card>
            </a>
        </div>
    </div>
</div>
@endsection