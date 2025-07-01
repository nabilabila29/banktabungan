@extends('layouts.app')

@section('title', 'Tambah Nasabah - Bank Kita')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-8">
    <div class="max-w-4xl mx-auto px-4">
        <!-- Header Section -->
        <div class="mb-8 animate-fade-in">
            <div class="flex items-center mb-6">
                <a href="{{ route('nasabah.index') }}" class="mr-4 p-2 bg-white rounded-lg shadow-sm hover:shadow-md transition">
                    <i class="fas fa-arrow-left text-blue-600"></i>
                </a>
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900">Tambah Nasabah Baru</h1>
                    <p class="text-gray-600 mt-1">Lengkapi data nasabah untuk membuka rekening baru</p>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="animate-slide-up">
            <x-card class="max-w-3xl mx-auto">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-plus text-2xl text-blue-600"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Form Pendaftaran Nasabah</h2>
                    <p class="text-gray-600">Silakan lengkapi data diri dengan benar dan akurat</p>
                </div>

                <form action="{{ route('nasabah.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Personal Information -->
                    <div class="bg-blue-50 rounded-xl p-6 mb-6">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-user text-white text-sm"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Informasi Pribadi</h3>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <x-input 
                                label="Nama Lengkap" 
                                name="nama" 
                                placeholder="Masukkan nama lengkap sesuai KTP"
                                required
                                autofocus
                            />
                            
                            <x-input 
                                label="NIK" 
                                name="nik" 
                                placeholder="16 digit NIK"
                                required
                                min="16"
                                max="16"
                            />
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="bg-green-50 rounded-xl p-6 mb-6">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-phone text-white text-sm"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Informasi Kontak</h3>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <x-input 
                                label="Email" 
                                name="email" 
                                type="email"
                                placeholder="contoh@email.com"
                                required
                            />
                            
                            <x-input 
                                label="Nomor Telepon" 
                                name="telepon" 
                                placeholder="+62 atau 08xxx"
                                required
                            />
                        </div>
                    </div>

                    <!-- Address Information -->
                    <div class="bg-purple-50 rounded-xl p-6 mb-6">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 bg-purple-600 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-map-marker-alt text-white text-sm"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Informasi Alamat</h3>
                        </div>
                        
                        <div class="mb-4">
                            <label for="alamat" class="block mb-2 font-medium text-gray-700">
                                Alamat Lengkap <span class="text-red-500">*</span>
                            </label>
                            <textarea 
                                id="alamat"
                                name="alamat" 
                                rows="4"
                                placeholder="Masukkan alamat lengkap sesuai KTP"
                                required
                                class="w-full p-4 border border-purple-200 rounded-lg focus:ring-2 focus:ring-purple-500 @error('alamat') border-red-400 @enderror transition resize-none"
                            >{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="text-red-500 text-sm mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="bg-yellow-50 rounded-xl p-6 mb-6">
                        <div class="flex items-start">
                            <input type="checkbox" id="terms" name="terms" required class="mt-1 mr-3">
                            <label for="terms" class="text-sm text-gray-700">
                                Saya menyetujui <a href="#" class="text-blue-600 hover:underline">Syarat dan Ketentuan</a> serta 
                                <a href="#" class="text-blue-600 hover:underline">Kebijakan Privasi</a> Bank Kita
                            </label>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                        <a href="{{ route('nasabah.index') }}" 
                           class="flex-1 sm:flex-none px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition font-semibold text-center">
                            <i class="fas fa-times mr-2"></i>Batal
                        </a>
                        <x-button type="submit" icon="fas fa-save" class="flex-1 sm:flex-none px-8 py-3 text-lg">
                            Simpan Data Nasabah
                        </x-button>
                    </div>
                </form>
            </x-card>
        </div>

        <!-- Info Card -->
        <div class="mt-8 animate-slide-up">
            <x-card class="bg-gradient-to-r from-blue-600 to-purple-600 text-white">
                <div class="flex items-start">
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                        <i class="fas fa-info-circle text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Informasi Penting</h3>
                        <ul class="space-y-1 text-blue-100">
                            <li class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                Data yang diisi harus sesuai dengan dokumen resmi (KTP)
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                Email dan nomor telepon akan digunakan untuk verifikasi
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                Setelah pendaftaran, nasabah dapat membuka rekening
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
    // Auto format NIK
    const nikInput = document.querySelector('input[name="nik"]');
    if (nikInput) {
        nikInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 16) {
                value = value.substring(0, 16);
            }
            e.target.value = value;
        });
    }

    // Auto format phone number
    const phoneInput = document.querySelector('input[name="telepon"]');
    if (phoneInput) {
        phoneInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.startsWith('0')) {
                value = '62' + value.substring(1);
            }
            if (!value.startsWith('62')) {
                value = '62' + value;
            }
            e.target.value = value;
        });
    }
});
</script>
@endpush