<nav id="main-navbar" class="fixed top-0 left-0 w-full z-50 shadow-md transition-all duration-300 font-[Poppins] bg-gradient-to-r from-fuchsia-600 via-pink-600 to-purple-700 text-white">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between px-4 py-4">
            <!-- Logo -->
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center shadow-md backdrop-blur-sm">
                    <i class="fas fa-university text-white text-lg"></i>
                </div>
                <div>
                    <span class="font-bold text-xl text-yellow-300 tracking-wide">Bank Kita</span>
                    <div class="text-xs text-white/70 -mt-1">Digital Banking</div>
                </div>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center gap-1">
                <a href="{{ route('home') }}" class="px-4 py-2 rounded-lg font-medium hover:text-yellow-300 transition-all duration-200 {{ request()->routeIs('home') ? 'text-yellow-300 underline underline-offset-4' : 'text-white/90' }}">
                    <i class="fas fa-home mr-2"></i>Beranda
                </a>
                @auth
                    <a href="{{ route('nasabah.index') }}" class="px-4 py-2 rounded-lg font-medium hover:text-yellow-300 transition-all duration-200 {{ request()->routeIs('nasabah.*') ? 'text-yellow-300 underline underline-offset-4' : 'text-white/90' }}">
                        <i class="fas fa-users mr-2"></i>Nasabah
                    </a>
                    <a href="{{ route('rekening.index') }}" class="px-4 py-2 rounded-lg font-medium hover:text-yellow-300 transition-all duration-200 {{ request()->routeIs('rekening.*') ? 'text-yellow-300 underline underline-offset-4' : 'text-white/90' }}">
                        <i class="fas fa-credit-card mr-2"></i>Rekening
                    </a>
                @endauth
                <a href="{{ route('faq') }}" class="px-4 py-2 rounded-lg font-medium hover:text-yellow-300 transition-all duration-200 {{ request()->routeIs('faq') ? 'text-yellow-300 underline underline-offset-4' : 'text-white/90' }}">
                    <i class="fas fa-question-circle mr-2"></i>FAQ
                </a>
                <a href="{{ route('contact') }}" class="px-4 py-2 rounded-lg font-medium hover:text-yellow-300 transition-all duration-200 {{ request()->routeIs('contact') ? 'text-yellow-300 underline underline-offset-4' : 'text-white/90' }}">
                    <i class="fas fa-phone mr-2"></i>Kontak
                </a>
            </div>

            <!-- User Menu / Auth Buttons -->
            <div class="hidden lg:flex items-center gap-2">
                @auth
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center gap-2 px-4 py-2 rounded-lg font-medium text-white hover:text-yellow-300 transition duration-200">
                            <div class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-white text-sm"></i>
                            </div>
                            <span>{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-100 py-2 z-50 text-gray-700">
                            <div class="px-4 py-2 border-b border-gray-100">
                                <p class="text-sm font-semibold">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                            </div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm hover:bg-gray-100 transition">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 rounded-lg font-medium text-white hover:text-yellow-300 transition-all duration-200">
                        <i class="fas fa-sign-in-alt mr-2"></i>Login
                    </a>
                    <a href="{{ route('register') }}" class="px-4 py-2 bg-yellow-400 text-gray-900 rounded-lg font-medium hover:bg-yellow-500 transition-all duration-200">
                        <i class="fas fa-user-plus mr-2"></i>Daftar
                    </a>
                @endauth
            </div>

            <!-- Mobile Toggle -->
            <button id="navbar-mobile-toggle" class="lg:hidden text-white hover:text-yellow-300 focus:outline-none transition-colors duration-200">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <div id="navbar-mobile-menu" class="lg:hidden hidden bg-white border-t border-gray-100 px-4 pb-4">
            <div class="py-2 space-y-1">
                <!-- Isi menu mobile tetap putih seperti sebelumnya, agar kontras -->
                <!-- Gunakan logika seperti sebelumnya -->
                <!-- ... (bisa dibiarkan sama atau disesuaikan jika kamu ingin dark-mode juga) -->
            </div>
        </div>
    </div>
</nav>
