@extends('layouts.app')

@section('title', 'Beranda - Bank Kita')

@section('content')
@push('head')
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">
<style>
    body { 
        font-family: 'Montserrat', sans-serif; 
        background-color: #f8fafc; /* Light background for overall freshness */
    }
    .gradient-hero {
        background: linear-gradient(135deg, #a78bfa 0%, #d946ef 50%, #f472b6 100%); /* Softer, more vibrant gradient */
    }
    .stat-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.08);
    }
    .feature-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.08);
    }
    .faq-item-card {
        transition: all 0.3s ease;
    }
    .faq-item-card.active {
        background-color: #fdf2f8; /* Light pink for active FAQ */
        border-color: #ec4899;
    }
    .faq-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-out;
    }
    .faq-content.open {
        max-height: 100px; /* Adjust as needed for content length */
        transition: max-height 0.5s ease-in;
    }
</style>
@endpush

<section class="relative overflow-hidden py-24 md:py-32 bg-gradient-to-br from-sky-200 via-purple-100 to-yellow-50 text-gray-800">
    <div class="absolute inset-0 bg-white opacity-20"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        <div class="flex justify-center mb-6 animate-pulse">
            <div class="bg-yellow-200/60 backdrop-blur-md rounded-full p-7 shadow-xl ring-4 ring-white/40">
                <i class="fas fa-piggy-bank text-6xl text-purple-800"></i>
            </div>
        </div>
        <h1 class="text-5xl md:text-6xl font-extrabold mb-5 leading-tight tracking-tight drop-shadow-sm text-gray-900">
            Welcome to <span class="text-purple-600">Bank Kita</span>
        </h1>
        <p class="text-lg md:text-xl text-gray-700 mb-10 max-w-3xl mx-auto">
            Banking reimagined for the digital generation. Simple, secure, and incredibly stylish.
        </p>
        <div class="flex flex-col sm:flex-row gap-5 justify-center">
            <a href="/rekening/create" class="bg-purple-600 hover:bg-purple-700 text-white px-8 py-4 rounded-full font-bold shadow-lg transition-all transform hover:scale-105 active:scale-95 flex items-center justify-center text-lg">
                <i class="fas fa-plus-circle mr-3"></i>Open New Account
            </a>
            <a href="/nasabah" class="bg-yellow-400 hover:bg-yellow-500 text-purple-900 px-8 py-4 rounded-full font-bold shadow-lg transition-all transform hover:scale-105 active:scale-95 flex items-center justify-center text-lg">
                <i class="fas fa-users-line mr-3"></i>View Customers
            </a>
        </div>
    </div>
</section>


<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-800 mb-4">Our <span class="text-fuchsia-600">Growth</span></h2>
            <p class="text-gray-500 text-lg">Growing strong, fast, and with purpose 💪</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            @php
                $stats = [
                    ['icon' => 'user-astronaut', 'label' => 'Active Users', 'value' => $totalNasabah ?? 0, 'color' => 'purple'],
                    ['icon' => 'wallet', 'label' => 'Accounts Opened', 'value' => $totalRekening ?? 0, 'color' => 'pink'],
                    ['icon' => 'hand-holding-dollar', 'label' => 'Micro Loans', 'value' => $totalPinjaman ?? 0, 'color' => 'indigo'],
                    ['icon' => 'store', 'label' => 'Digital Branches', 'value' => $totalCabang ?? 0, 'color' => 'fuchsia'],
                ];
            @endphp
            @foreach ($stats as $stat)
            <div class="stat-card bg-white p-7 rounded-2xl border border-gray-200 shadow-sm text-center">
                <div class="w-16 h-16 bg-{{ $stat['color'] }}-100 text-{{ $stat['color'] }}-600 flex items-center justify-center rounded-full mx-auto mb-4 text-3xl">
                    <i class="fas fa-{{ $stat['icon'] }}"></i>
                </div>
                <div class="text-4xl font-extrabold text-gray-900 mb-1" id="stat-{{ Str::slug($stat['label']) }}" data-value="{{ $stat['value'] }}">0</div>
                <p class="text-md text-gray-600 font-semibold">{{ $stat['label'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 bg-gradient-to-br from-pink-50 to-fuchsia-50">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-4xl md:text-5xl font-extrabold text-gray-800 mb-4">Why <span class="text-purple-600">Bank Kita</span>?</h2>
        <p class="text-gray-500 text-lg mb-12">Because we're more than just a bank, we're Gen Z's financial partner 🚀</p>
        <div class="grid md:grid-cols-3 gap-8">
            @php
                $features = [
                    ['icon' => 'fingerprint', 'title' => 'Smart Security', 'desc' => 'Biometric & encrypted transactions for next-level peace of mind.'],
                    ['icon' => 'mobile-alt', 'title' => 'Full Mobile Access', 'desc' => 'Manage everything from your phone, anywhere, anytime.'],
                    ['icon' => 'headset', 'title' => '24/7 Care', 'desc' => 'Friendly and lightning-fast support whenever you need it.'],
                ];
            @endphp
            @foreach ($features as $feature)
            <div class="feature-card bg-white p-8 rounded-2xl border border-pink-100 shadow-md">
                <div class="w-16 h-16 bg-fuchsia-100 text-fuchsia-600 rounded-full flex items-center justify-center mx-auto mb-5 text-3xl">
                    <i class="fas fa-{{ $feature['icon'] }}"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $feature['title'] }}</h3>
                <p class="text-base text-gray-600">{{ $feature['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-4xl md:text-5xl font-extrabold text-gray-800 mb-6">About <span class="text-pink-600">Bank Kita</span></h2>
                <p class="text-gray-600 text-lg mb-6 leading-relaxed">A digital bank with a modern approach. From instant accounts to micro-loans—all at your fingertips!</p>
                <ul class="space-y-3 text-base text-gray-700">
                    <li><i class="fas fa-check-circle text-fuchsia-600 mr-3 text-lg"></i> OJK Verified & Trusted</li>
                    <li><i class="fas fa-check-circle text-fuchsia-600 mr-3 text-lg"></i> LPS Insured Deposits</li>
                    <li><i class="fas fa-check-circle text-fuchsia-600 mr-3 text-lg"></i> 24-Hour Dedicated Support</li>
                </ul>
            </div>
            <div class="bg-gray-50 p-8 rounded-2xl shadow-xl border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-800 mb-5">Why Our Users Love Us?</h3>
                <ul class="text-gray-700 space-y-3">
                    <li><i class="fas fa-shield-alt mr-3 text-purple-600 text-lg"></i> World-class encryption</li>
                    <li><i class="fas fa-people-arrows mr-3 text-purple-600 text-lg"></i> Caring and responsive team</li>
                    <li><i class="fas fa-mobile-screen-button mr-3 text-purple-600 text-lg"></i> Instant and seamless access</li>
                    <li><i class="fas fa-clock-rotate-right mr-3 text-purple-600 text-lg"></i> Always-on 24/7 readiness</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-gradient-to-r from-purple-600 to-fuchsia-600 text-white text-center shadow-inner">
    <div class="max-w-5xl mx-auto px-6">
        <h2 class="text-4xl md:text-5xl font-extrabold mb-6 leading-tight">Ready to Experience Modern Banking?</h2>
        <p class="text-xl text-white/90 mb-10">Join thousands of Gen Z users who are redefining their financial journey.</p>
        <a href="/rekening/create" class="inline-flex items-center bg-yellow-300 hover:bg-yellow-400 text-purple-900 px-10 py-5 rounded-full font-bold text-xl shadow-lg transition-all transform hover:scale-105 active:scale-95 ring-4 ring-yellow-200">
            <i class="fas fa-hand-point-right mr-3"></i>Get Started Now!
        </a>
    </div>
</section>

<section class="py-20 bg-gray-50">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-800">Frequently Asked <span class="text-fuchsia-600">Questions</span></h2>
            <p class="text-gray-500 text-lg">Got questions? We've got answers! 👇</p>
        </div>
        <div class="space-y-4">
            @php
                $faq = [
                    ['q' => 'How do I open an account?', 'a' => 'You can easily open an account through our mobile app or visit one of our digital branches.'],
                    ['q' => 'Is my money safe with Bank Kita?', 'a' => 'Absolutely! We are officially verified by OJK (Financial Services Authority) and your deposits are guaranteed by LPS (Deposit Insurance Agency).'],
                    ['q' => 'What are the monthly administration fees?', 'a' => 'Our monthly administration fee is only IDR 5,000, keeping it super affordable for everyone.'],
                    ['q' => 'Can I get a loan?', 'a' => 'Yes, Bank Kita offers micro-loans with easy application processes directly through our app.'],
                    ['q' => 'How do I contact customer support?', 'a' => 'Our friendly support team is available 24/7 via chat in the app, email, or phone call.'],
                ];
            @endphp
            @foreach ($faq as $item)
            <div class="faq-item-card bg-white p-6 rounded-xl border border-gray-200 shadow-sm cursor-pointer" onclick="toggleFAQ(this)">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $item['q'] }}</h3>
                    <i class="fas fa-chevron-down text-gray-500 transition-transform duration-300"></i>
                </div>
                <div class="faq-content mt-3 text-base text-gray-600">
                    <p>{{ $item['a'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
function animateStats() {
    const stats = document.querySelectorAll('[id^="stat-"]');
    stats.forEach(stat => {
        const value = parseInt(stat.getAttribute('data-value'));
        const duration = 2000; // Increased duration for smoother animation
        let start = 0;
        let startTime = null;

        function easeOutQuad(t) {
            return t * (2 - t);
        }

        function animate(currentTime) {
            if (!startTime) startTime = currentTime;
            const progress = (currentTime - startTime) / duration;
            const easedProgress = easeOutQuad(progress);

            if (progress < 1) {
                stat.textContent = Math.floor(easedProgress * value).toLocaleString();
                requestAnimationFrame(animate);
            } else {
                stat.textContent = value.toLocaleString();
            }
        }
        requestAnimationFrame(animate);
    });
}

function toggleFAQ(element) {
    const content = element.querySelector('.faq-content');
    const icon = element.querySelector('i');

    if (content.classList.contains('open')) {
        content.style.maxHeight = '0';
        content.classList.remove('open');
        element.classList.remove('active');
        icon.classList.remove('rotate-180');
    } else {
        // Close all other open FAQs
        document.querySelectorAll('.faq-content.open').forEach(openContent => {
            openContent.style.maxHeight = '0';
            openContent.classList.remove('open');
            openContent.closest('.faq-item-card').classList.remove('active');
            openContent.previousElementSibling.querySelector('i').classList.remove('rotate-180');
        });

        // Open the clicked FAQ
        content.style.maxHeight = content.scrollHeight + 'px'; // Set max-height to scrollHeight for smooth transition
        content.classList.add('open');
        element.classList.add('active');
        icon.classList.add('rotate-180');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const statsSection = document.querySelector('.py-20.bg-white'); // Target the main stats section
    if (statsSection) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateStats();
                    observer.unobserve(statsSection); // Stop observing once animated
                }
            });
        }, { threshold: 0.2 }); // Trigger when 20% of the section is visible
        observer.observe(statsSection);
    }
});
</script>
@endpush