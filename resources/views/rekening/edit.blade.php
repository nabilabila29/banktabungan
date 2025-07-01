@extends('layouts.app')

@section('title', 'Edit Rekening - Bank Kita')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-50 to-blue-100 py-8">
    <div class="max-w-4xl mx-auto px-4">
        <!-- Header Section -->
        <div class="mb-8 animate-fade-in">
            <div class="flex items-center mb-6">
                <a href="{{ route('rekening.index') }}" class="mr-4 p-2 bg-white rounded-lg shadow-sm hover:shadow-md transition">
                    <i class="fas fa-arrow-left text-green-600"></i>
                </a>
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900">Edit Data Rekening</h1>
                    <p class="text-gray-600 mt-1">Perbarui informasi rekening nasabah</p>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="animate-slide-up">
            <x-card class="max-w-2xl mx-auto">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-edit text-2xl text-green-600"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Form Edit Rekening</h2>
                    <p class="text-gray-600">Perbarui data rekening dengan informasi terbaru</p>
                </div>

                @if ($errors->any())
                    <x-alert type="error" class="mb-6">
                        <ul class="list-disc ml-5">
                            @foreach ($errors->all() as $error)
                                <li class="text-sm">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </x-alert>
                @endif

                <form action="{{ route('rekening.update', $rekening->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <!-- Nasabah Selection -->
                    <div class="bg-blue-50 rounded-xl p-6 mb-6">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-user text-white text-sm"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Pilih Nasabah</h3>
                        </div>
                        
                        <div>
                            <label for="nasabah_id" class="block mb-2 font-medium text-gray-700">
                                Nasabah <span class="text-red-500">*</span>
                            </label>
                            <select 
                                id="nasabah_id"
                                name="nasabah_id" 
                                class="w-full p-4 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 @error('nasabah_id') border-red-400 @enderror transition"
                                required
                            >
                                @foreach ($nasabahs as $nasabah)
                                    <option value="{{ $nasabah->id }}" {{ $rekening->nasabah_id == $nasabah->id ? 'selected' : '' }}>
                                        {{ $nasabah->nama }} ({{ $nasabah->nik }})
                                    </option>
                                @endforeach
                            </select>
                            @error('nasabah_id')
                                <div class="text-red-500 text-sm mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Account Type -->
                    <div class="bg-green-50 rounded-xl p-6 mb-6">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-credit-card text-white text-sm"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Jenis Rekening</h3>
                        </div>
                        
                        <div>
                            <label for="jenis" class="block mb-2 font-medium text-gray-700">
                                Jenis Rekening <span class="text-red-500">*</span>
                            </label>
                            <select 
                                id="jenis"
                                name="jenis" 
                                class="w-full p-4 border border-green-200 rounded-lg focus:ring-2 focus:ring-green-500 @error('jenis') border-red-400 @enderror transition"
                                required
                            >
                                <option value="tabungan" {{ $rekening->jenis == 'tabungan' ? 'selected' : '' }}>Tabungan</option>
                                <option value="giro" {{ $rekening->jenis == 'giro' ? 'selected' : '' }}>Giro</option>
                                <option value="deposito" {{ $rekening->jenis == 'deposito' ? 'selected' : '' }}>Deposito</option>
                            </select>
                            @error('jenis')
                                <div class="text-red-500 text-sm mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Initial Deposit -->
                    <div class="bg-purple-50 rounded-xl p-6 mb-6">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 bg-purple-600 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-money-bill-wave text-white text-sm"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Setoran Awal</h3>
                        </div>
                        
                        <div>
                            <label for="setor_awal" class="block mb-2 font-medium text-gray-700">
                                Saldo Awal (Rp) <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="number" 
                                id="setor_awal"
                                name="setor_awal" 
                                min="100000" 
                                required 
                                value="{{ old('setor_awal', $rekening->setor_awal) }}" 
                                placeholder="Minimal Rp100.000" 
                                class="w-full p-4 border border-purple-200 rounded-lg focus:ring-2 focus:ring-purple-500 @error('setor_awal') border-red-400 @enderror transition"
                            />
                            <p class="text-sm text-gray-500 mt-2">
                                <i class="fas fa-info-circle mr-1"></i>
                                Minimal setoran awal Rp100.000
                            </p>
                            @error('setor_awal')
                                <div class="text-red-500 text-sm mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                        <a href="{{ route('rekening.index') }}" 
                           class="flex-1 sm:flex-none px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition font-semibold text-center">
                            <i class="fas fa-times mr-2"></i>Batal
                        </a>
                        <button type="submit" class="flex-1 sm:flex-none px-8 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-semibold text-lg">
                            <i class="fas fa-save mr-2"></i>Perbarui Rekening
                        </button>
                    </div>
                </form>
            </x-card>
        </div>

        <!-- Info Card -->
        <div class="mt-8 animate-slide-up">
            <x-card class="bg-gradient-to-r from-green-600 to-blue-600 text-white">
                <div class="flex items-start">
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                        <i class="fas fa-info-circle text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Informasi Penting</h3>
                        <ul class="space-y-1 text-green-100">
                            <li class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                Perubahan jenis rekening dapat mempengaruhi suku bunga
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                Saldo awal tidak boleh kurang dari minimum yang ditentukan
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                Data rekening akan tetap aman dan terenkripsi
                            </li>
                        </ul>
                    </div>
                </div>
            </x-card>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto format currency input
    const setorAwalInput = document.querySelector('#setor_awal');
    if (setorAwalInput) {
        setorAwalInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value < 100000) {
                e.target.setCustomValidity('Minimal setoran awal Rp100.000');
            } else {
                e.target.setCustomValidity('');
            }
        });
    }
});
</script>
@endpush