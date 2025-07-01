@extends('layouts.app')

@section('title', 'FAQ - Bank Kita')

@push('head')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<style>
    body { font-family: 'Poppins', sans-serif; }
</style>
@endpush

@section('content')
<div class="min-h-screen bg-gradient-to-br from-pink-100 via-fuchsia-100 to-yellow-100 py-16">
    <div class="max-w-6xl mx-auto px-4">
        <!-- Header Section -->
        <div class="mb-12 text-center animate-fade-in">
            <div class="flex justify-center mb-6">
                <div class="w-16 h-16 bg-gradient-to-br from-fuchsia-400 to-pink-500 rounded-full flex items-center justify-center shadow-lg">
                    <i class="fas fa-question-circle text-3xl text-white"></i>
                </div>
            </div>
            <h1 class="text-4xl md:text-5xl font-extrabold text-fuchsia-700 mb-4">FAQ &mdash; Tanya Apa Aja 🔍</h1>
            <p class="text-lg text-gray-700 max-w-2xl mx-auto">
                Semua jawaban yang kamu cari tentang layanan Bank Kita. Nggak perlu ribet!
            </p>
        </div>

        <!-- FAQ Categories -->
        <div class="grid md:grid-cols-3 gap-8 mb-16">
            <!-- Account Management -->
            <x-card class="text-center border border-fuchsia-200 hover:shadow-lg transition">
                <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-user-cog text-2xl text-pink-600"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Akun & Rekening</h3>
                <p class="text-gray-600 mb-4">Pertanyaan seputar buka akun, update data, dan lainnya.</p>
                <div class="text-sm text-pink-600 font-semibold">5 Pertanyaan</div>
            </x-card>

            <!-- Banking Services -->
            <x-card class="text-center border border-yellow-200 hover:shadow-lg transition">
                <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-university text-2xl text-yellow-600"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Layanan Kami</h3>
                <p class="text-gray-600 mb-4">Info lengkap tentang fitur dan produk unggulan.</p>
                <div class="text-sm text-yellow-600 font-semibold">4 Pertanyaan</div>
            </x-card>

            <!-- Security & Support -->
            <x-card class="text-center border border-purple-200 hover:shadow-lg transition">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-shield-alt text-2xl text-purple-600"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Keamanan & Bantuan</h3>
                <p class="text-gray-600 mb-4">Segala tentang proteksi akun dan CS 24/7 kami.</p>
                <div class="text-sm text-purple-600 font-semibold">6 Pertanyaan</div>
            </x-card>
        </div>

        <!-- FAQ Section -->
        <div class="space-y-6">
            @yield('faq_sections')
        </div>

        <!-- Contact Support Section -->
        <div class="mt-20">
            <x-card class="text-center bg-gradient-to-r from-fuchsia-500 to-pink-400 text-white">
                <div class="max-w-2xl mx-auto">
                    <h2 class="text-2xl font-bold mb-2">Masih bingung atau butuh bantuan lebih lanjut?</h2>
                    <p class="text-pink-100 mb-6">
                        Tim support kami selalu standby buat bantuin kamu kapan pun kamu butuh.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 bg-white text-fuchsia-600 rounded-lg font-semibold hover:bg-gray-100 transition">
                            <i class="fas fa-headset mr-2"></i>Hubungi Kami
                        </a>
                        <a href="https://wa.me/6281234567890" target="_blank" class="inline-flex items-center px-6 py-3 bg-green-500 text-white rounded-lg font-semibold hover:bg-green-600 transition">
                            <i class="fab fa-whatsapp mr-2"></i>WhatsApp
                        </a>
                    </div>
                </div>
            </x-card>
        </div>
    </div>
</div>

@push('scripts')
<script>
function toggleFAQ(element) {
    const content = element.nextElementSibling;
    const icon = element.querySelector('i');
    content.classList.toggle('hidden');
    icon.style.transform = content.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
}

document.addEventListener('DOMContentLoaded', function () {
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach((item, i) => {
        item.style.animationDelay = `${i * 0.1}s`;
        item.classList.add('animate-slide-up');
    });
});
</script>
@endpush
