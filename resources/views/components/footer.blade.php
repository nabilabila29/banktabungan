<footer class="bg-gradient-to-br from-pink-100 via-fuchsia-100 to-purple-100 text-gray-800 pt-16 pb-10 font-[Montserrat] border-t border-pink-200">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12 mb-12">
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-yellow-400 rounded-xl flex items-center justify-center shadow-md">
                        <i class="fas fa-university text-white text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="font-bold text-2xl text-fuchsia-600">Bank Kita</h2>
                        <p class="text-sm text-gray-600">Digital Banking Gen Z</p>
                    </div>
                </div>
                <p class="text-gray-700 text-sm">
                    Solusi keuangan modern dan aman, dengan gaya fresh yang cocok untuk generasi muda masa kini.
                </p>
                <div class="flex gap-4 mt-4">
                    <a href="https://wa.me/6288212275196" target="_blank" class="text-fuchsia-600 hover:text-yellow-500 transition">
                        <i class="fab fa-whatsapp text-xl"></i>
                    </a>
                    <a href="https://x.com/mybiela_" target="_blank" class="text-fuchsia-600 hover:text-yellow-500 transition">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                    <a href="https://www.instagram.com/nabl06_/" target="_blank" class="text-fuchsia-600 hover:text-yellow-500 transition">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <a href="https://www.facebook.com/?locale=id_ID" target="_blank" class="text-fuchsia-600 hover:text-yellow-500 transition">
                        <i class="fab fa-facebook-f text-xl"></i>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div>
                    <h3 class="text-pink-600 font-semibold mb-3">Layanan</h3>
                    <ul class="space-y-2 text-sm text-gray-700">
                        <li><a href="{{ route('nasabah.index') }}" class="hover:text-fuchsia-600 transition">Kelola Nasabah</a></li>
                        <li><a href="{{ route('rekening.index') }}" class="hover:text-fuchsia-600 transition">Buka Rekening</a></li>
                        <li><a href="{{ route('nasabah.create') }}" class="hover:text-fuchsia-600 transition">Tambah Nasabah</a></li>
                        <li><a href="{{ route('rekening.create') }}" class="hover:text-fuchsia-600 transition">Buat Rekening</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-pink-600 font-semibold mb-3">Kontak</h3>
                    <ul class="space-y-2 text-sm text-gray-700">
                        <li><i class="fas fa-map-marker-alt text-fuchsia-500 mr-2"></i> Tangerang</li>
                        <li><i class="fas fa-phone text-fuchsia-500 mr-2"></i> +62 882-1227-5196</li>
                        <li><i class="fas fa-envelope text-fuchsia-500 mr-2"></i> nabilabila290603@gmail.com</li>
                        <li><i class="fas fa-clock text-fuchsia-500 mr-2"></i> 24/7 Online</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="border-t border-pink-200 pt-6 text-center text-sm text-gray-500">
            &copy; <span id="footer-year"></span> Nabila. All rights reserved.
        </div>
    </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const yearEl = document.getElementById('footer-year');
    if (yearEl) yearEl.textContent = new Date().getFullYear();
});
</script>