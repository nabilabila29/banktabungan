@extends('layouts.app')

@section('title', 'Kontak - Bank Kita')

@section('content')
@push('head')
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Montserrat', sans-serif;
    }
    .contact-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .contact-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.08);
    }
</style>
@endpush

<div class="max-w-5xl mx-auto px-6 py-16 bg-gradient-to-br from-pink-100 via-fuchsia-100 to-yellow-100 rounded-2xl shadow-xl">
    <h1 class="text-4xl md:text-5xl font-extrabold text-center text-fuchsia-600 mb-8">Let's Talk 💬</h1>
    <p class="text-center text-gray-700 mb-12 text-lg md:text-xl">
        Tim support kami selalu ready 24/7. Hubungi kami lewat salah satu cara di bawah ini — no drama, cuma solusi.
    </p>

    <div class="grid md:grid-cols-3 gap-8 text-center">
        <!-- Telepon -->
        <div class="contact-card bg-white p-6 rounded-2xl border border-fuchsia-100 shadow-sm">
            <div class="text-fuchsia-600 text-5xl mb-3">📞</div>
            <h2 class="text-xl font-bold text-gray-800 mb-2">Call Us</h2>
            <p class="text-gray-600 mb-2">Bantuan cepat kapan aja</p>
            <a href="tel:+6288212275196" class="text-fuchsia-600 font-semibold hover:underline">
                +62 882-1227-5196
            </a>
        </div>

        <!-- Email -->
        <div class="contact-card bg-white p-6 rounded-2xl border border-yellow-100 shadow-sm">
            <div class="text-yellow-500 text-5xl mb-3">📧</div>
            <h2 class="text-xl font-bold text-gray-800 mb-2">Email Us</h2>
            <p class="text-gray-600 mb-2">Butuh detail? Kirim email aja</p>
            <a href="mailto:nabilabila290603@gmail.com" class="text-yellow-600 font-semibold hover:underline">
                nabilabila290603@gmail.com
            </a>
        </div>

        <!-- WhatsApp -->
        <div class="contact-card bg-white p-6 rounded-2xl border border-purple-100 shadow-sm">
            <div class="text-purple-600 text-5xl mb-3">💬</div>
            <h2 class="text-xl font-bold text-gray-800 mb-2">Chat WhatsApp</h2>
            <p class="text-gray-600 mb-2">Fast response dari tim kami</p>
            <a href="https://wa.me/6288212275196" class="text-purple-600 font-semibold hover:underline">
                +62 882-1227-5196
            </a>
        </div>
    </div>
</div>
@endsection
