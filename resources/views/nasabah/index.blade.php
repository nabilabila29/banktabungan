@extends('layouts.app')

@section('title', 'Data Nasabah - Bank Kita')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-8">
    <div class="main-container">
        <!-- Header Section -->
        <div class="mb-8 animate-fade-in">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div class="mb-6 lg:mb-0">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center mr-4">
                            <i class="fas fa-users text-2xl text-white"></i>
                        </div>
                        <div>
                            <h1 class="text-3xl md:text-4xl font-bold text-gray-900">Data Nasabah</h1>
                            <p class="text-gray-600 mt-1">Kelola data nasabah bank dengan mudah dan aman</p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row gap-3">
                    <a href="{{ route('nasabah.create') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-300 font-semibold">
                        <i class="fas fa-plus mr-2"></i>Tambah Nasabah
                    </a>
                    <button onclick="exportData()" class="inline-flex items-center px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-all duration-300 font-semibold">
                        <i class="fas fa-download mr-2"></i>Export Data
                    </button>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8 animate-slide-up">
            <x-card class="text-center border-l-4 border-blue-500 card-hover">
                <div class="flex items-center justify-center mb-3">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-users text-xl text-blue-600"></i>
                    </div>
                </div>
                <div class="text-2xl font-bold text-blue-600 mb-1">{{ $nasabahs->total() }}</div>
                <div class="text-gray-600 text-sm">Total Nasabah</div>
            </x-card>
            
            <x-card class="text-center border-l-4 border-green-500 card-hover">
                <div class="flex items-center justify-center mb-3">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-user-check text-xl text-green-600"></i>
                    </div>
                </div>
                <div class="text-2xl font-bold text-green-600 mb-1">{{ $nasabahs->where('status', 'aktif')->count() }}</div>
                <div class="text-gray-600 text-sm">Nasabah Aktif</div>
            </x-card>
            
            <x-card class="text-center border-l-4 border-purple-500 card-hover">
                <div class="flex items-center justify-center mb-3">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-credit-card text-xl text-purple-600"></i>
                    </div>
                </div>
                <div class="text-2xl font-bold text-purple-600 mb-1">{{ $totalRekening ?? 0 }}</div>
                <div class="text-gray-600 text-sm">Total Rekening</div>
            </x-card>
            
            <x-card class="text-center border-l-4 border-orange-500 card-hover">
                <div class="flex items-center justify-center mb-3">
                    <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-chart-line text-xl text-orange-600"></i>
                    </div>
                </div>
                <div class="text-2xl font-bold text-orange-600 mb-1">{{ $nasabahs->where('created_at', '>=', now()->subMonth())->count() }}</div>
                <div class="text-gray-600 text-sm">Bulan Ini</div>
            </x-card>
        </div>

        <!-- Search and Filter Section -->
        <x-card class="mb-8 animate-slide-up">
            <form action="{{ route('nasabah.index') }}" method="GET" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input 
                            type="text" 
                            name="search" 
                            value="{{ request('search') }}" 
                            placeholder="Cari nama, NIK, atau email..." 
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                        >
                    </div>
                    <div class="relative">
                        <select name="status" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                            <option value="">Semua Status</option>
                            <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ request('status') == 'nonaktif' ? 'selected' : '' }}>Non Aktif</option>
                        </select>
                    </div>
                    <div class="flex gap-2">
                        <button type="submit" class="flex-1 bg-blue-600 text-white px-4 py-3 rounded-lg hover:bg-blue-700 transition font-semibold">
                            <i class="fas fa-search mr-2"></i>Cari
                        </button>
                        <a href="{{ route('nasabah.index') }}" class="px-4 py-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                            <i class="fas fa-refresh"></i>
                        </a>
                    </div>
                </div>
            </form>
        </x-card>

        <!-- Data Table Section -->
        <x-card class="animate-slide-up">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nasabah</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kontak</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Bergabung</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($nasabahs as $index => $nasabah)
                        <tr class="hover:bg-blue-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ ($nasabahs->currentPage() - 1) * $nasabahs->perPage() + $index + 1 }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                        <i class="fas fa-user text-blue-600"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm font-semibold text-gray-900">{{ $nasabah->nama }}</div>
                                        <div class="text-sm text-gray-500">NIK: {{ $nasabah->nik }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $nasabah->email }}</div>
                                <div class="text-sm text-gray-500">{{ $nasabah->telepon }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <i class="fas fa-check-circle mr-1"></i>Aktif
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $nasabah->created_at->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('nasabah.show', $nasabah->id) }}" 
                                       class="inline-flex items-center px-3 py-1.5 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition text-sm">
                                        <i class="fas fa-eye mr-1"></i>Detail
                                    </a>
                                    <a href="{{ route('nasabah.edit', $nasabah->id) }}" 
                                       class="inline-flex items-center px-3 py-1.5 bg-yellow-100 text-yellow-700 rounded-lg hover:bg-yellow-200 transition text-sm">
                                        <i class="fas fa-edit mr-1"></i>Edit
                                    </a>
                                    <form action="{{ route('nasabah.destroy', $nasabah->id) }}" method="POST" class="inline"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus nasabah {{ $nasabah->nama }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="inline-flex items-center px-3 py-1.5 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition text-sm">
                                            <i class="fas fa-trash mr-1"></i>Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                        <i class="fas fa-users text-2xl text-gray-400"></i>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Belum ada data nasabah</h3>
                                    <p class="text-gray-500 mb-6">Mulai dengan menambahkan nasabah pertama Anda</p>
                                    <a href="{{ route('nasabah.create') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-semibold">
                                        <i class="fas fa-plus mr-2"></i>Tambah Nasabah Pertama
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            @if($nasabahs->hasPages())
                <div class="px-6 py-4 border-t border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-700">
                            Menampilkan {{ $nasabahs->firstItem() }} sampai {{ $nasabahs->lastItem() }} dari {{ $nasabahs->total() }} data
                        </div>
                        <div class="flex space-x-2">
                            @if($nasabahs->onFirstPage())
                                <span class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                                    <i class="fas fa-chevron-left"></i>
                                </span>
                            @else
                                <a href="{{ $nasabahs->previousPageUrl() }}" class="px-3 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            @endif
                            
                            @foreach($nasabahs->getUrlRange(1, $nasabahs->lastPage()) as $page => $url)
                                @if($page == $nasabahs->currentPage())
                                    <span class="px-3 py-2 bg-blue-600 text-white rounded-lg">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}" class="px-3 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">{{ $page }}</a>
                                @endif
                            @endforeach
                            
                            @if($nasabahs->hasMorePages())
                                <a href="{{ $nasabahs->nextPageUrl() }}" class="px-3 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            @else
                                <span class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                                    <i class="fas fa-chevron-right"></i>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </x-card>
    </div>
</div>

@push('scripts')
<script>
function exportData() {
    // Implementasi export data
    alert('Fitur export data akan segera tersedia!');
}

// Add loading state to buttons
document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('button[type="submit"]');
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Memproses...';
            this.disabled = true;
        });
    });
});
</script>
@endpush