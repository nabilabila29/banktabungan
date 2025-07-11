@extends("layouts.app")

@section("title", "Detail Rekening - Bank Kita")

@section("content")
<div class="min-h-screen bg-gradient-to-br from-green-50 to-blue-100 py-8">
    <div class="max-w-4xl mx-auto px-4">
        <!-- Header Section -->
        <div class="mb-8 animate-fade-in">
            <div class="flex items-center mb-6">
                <a href="{{ route("rekening.index") }}" class="mr-4 p-2 bg-white rounded-lg shadow-sm hover:shadow-md transition">
                    <i class="fas fa-arrow-left text-green-600"></i>
                </a>
                <div class="flex-1">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900">Detail Rekening</h1>
                    <p class="text-gray-600 mt-1">Informasi lengkap rekening nasabah</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route("rekening.edit", $rekening->id) }}" 
                       class="inline-flex items-center px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition font-semibold">
                        <i class="fas fa-edit mr-2"></i>
                        Edit
                    </a>
                </div>
            </div>
        </div>

        <!-- Rekening Card -->
        <div class="animate-slide-up">
            <x-card class="mb-8">
                <div class="flex items-center mb-8">
                    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mr-6">
                        <i class="fas fa-credit-card text-3xl text-green-600"></i>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">Rekening {{ ucfirst($rekening->jenis) }}</h2>
                        <p class="text-gray-600 text-lg">Nasabah: {{ $rekening->nasabah->nama }}</p>
                        <div class="flex items-center mt-2">
                            @php
                                $jenisColors = [
                                    "tabungan" => "bg-green-100 text-green-800",
                                    "giro" => "bg-blue-100 text-blue-800",
                                    "deposito" => "bg-purple-100 text-purple-800"
                                ];
                                $colorClass = $jenisColors[$rekening->jenis] ?? "bg-gray-100 text-gray-800";
                            @endphp
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $colorClass }}">
                                <i class="fas fa-check-circle mr-1"></i>{{ ucfirst($rekening->jenis) }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Account Information -->
                    <div class="bg-green-50 rounded-xl p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-credit-card text-white text-sm"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Informasi Rekening</h3>
                        </div>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Jenis Rekening</label>
                                <p class="text-gray-900 font-medium">{{ ucfirst($rekening->jenis) }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Setor Awal</label>
                                <p class="text-gray-900 font-medium text-lg">Rp {{ number_format($rekening->setor_awal, 0, ",", ".") }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Status</label>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <i class="fas fa-check-circle mr-1"></i>Aktif
                                </span>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Tanggal Dibuat</label>
                                <p class="text-gray-900 font-medium">{{ $rekening->created_at->format("d M Y H:i") }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Nasabah Information -->
                    <div class="bg-blue-50 rounded-xl p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-user text-white text-sm"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Informasi Nasabah</h3>
                        </div>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Nama Lengkap</label>
                                <p class="text-gray-900 font-medium">{{ $rekening->nasabah->nama }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">NIK</label>
                                <p class="text-gray-900 font-medium">{{ $rekening->nasabah->nik }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Email</label>
                                <p class="text-gray-900 font-medium">{{ $rekening->nasabah->email ?? "-" }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Telepon</label>
                                <p class="text-gray-900 font-medium">{{ $rekening->nasabah->telepon ?? "-" }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address Information -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <div class="bg-purple-50 rounded-xl p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 bg-purple-600 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-map-marker-alt text-white text-sm"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Alamat Nasabah</h3>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Alamat Lengkap</label>
                            <p class="text-gray-900 font-medium">{{ $rekening->nasabah->alamat ?? "-" }}</p>
                        </div>
                    </div>
                </div>

                <!-- Timestamps -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-500">
                        <div class="flex items-center">
                            <i class="fas fa-calendar-plus text-green-500 mr-2"></i>
                            <span class="font-medium">Dibuat pada:</span> {{ $rekening->created_at->format("d M Y H:i") }}
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-calendar-check text-blue-500 mr-2"></i>
                            <span class="font-medium">Terakhir diperbarui:</span> {{ $rekening->updated_at->format("d M Y H:i") }}
                        </div>
                    </div>
                </div>
            </x-card>
        </div>

        <!-- Action Cards -->
        <div class="grid md:grid-cols-3 gap-6 animate-slide-up">
            <a href="{{ route("rekening.edit", $rekening->id) }}" class="group">
                <x-card class="text-center card-hover h-full">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-yellow-200 transition-colors">
                        <i class="fas fa-edit text-2xl text-yellow-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Edit Rekening</h3>
                    <p class="text-gray-600 text-sm">Perbarui informasi rekening</p>
                </x-card>
            </a>
            
            <a href="{{ route("nasabah.show", $rekening->nasabah->id) }}" class="group">
                <x-card class="text-center card-hover h-full">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-blue-200 transition-colors">
                        <i class="fas fa-user text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Lihat Nasabah</h3>
                    <p class="text-gray-600 text-sm">Detail data nasabah</p>
                </x-card>
            </a>
            
            <a href="{{ route("rekening.index") }}" class="group">
                <x-card class="text-center card-hover h-full">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-gray-200 transition-colors">
                        <i class="fas fa-arrow-left text-2xl text-gray-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Kembali</h3>
                    <p class="text-gray-600 text-sm">Ke daftar rekening</p>
                </x-card>
            </a>
        </div>
    </div>
</div>
@endsection
