<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bank Kita - Sistem Pembukaan Rekening')</title>

    <!-- TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Poppins', 'Inter', 'Arial', 'sans-serif'],
                    },
                    colors: {
                        'bank': {
                            50: '#f9fafb',
                            100: '#f3f4f6',
                            500: '#9ca3af',
                            600: '#6b7280',
                            700: '#4b5563',
                            800: '#374151',
                            900: '#1f2937',
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.6s ease-in-out',
                        'slide-up': 'slideUp 0.8s ease-out',
                        'bounce-in': 'bounceIn 0.8s ease-out',
                        'float': 'float 3s ease-in-out infinite',
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Poppins', 'Inter', Arial, sans-serif;
            background: linear-gradient(120deg, #f0f7fa 0%, #e0ecfc 50%, #f7fafc 100%);
            min-height: 100vh;
            transition: background 0.5s;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .animate-fade-in {
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-slide-up {
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-bounce-in {
            animation: bounceIn 0.8s ease-out;
        }

        @keyframes bounceIn {
            0% { opacity: 0; transform: scale(0.3); }
            50% { opacity: 1; transform: scale(1.05); }
            70% { transform: scale(0.9); }
            100% { opacity: 1; transform: scale(1); }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .text-gold {
            color: #d4af37;
            font-family: 'Poppins', sans-serif;
        }

        .card-hover {
            transition: all 0.3s cubic-bezier(.4,2,.3,1);
        }

        .card-hover:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.08), 0 10px 10px -5px rgba(0, 0, 0, 0.03);
        }

        .navbar-blur {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
        }

        .main-container {
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
            padding: 2.5rem 1.25rem 1.5rem 1.25rem;
            width: 100%;
            min-height: 80vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-top: 6.5rem;
        }

        .main-card {
            background: rgba(255,255,255,0.98);
            border-radius: 1.5rem;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.08);
            padding: 2.5rem 2rem;
            margin-bottom: 2.5rem;
            transition: box-shadow 0.3s, background 0.3s;
        }
    </style>

    @stack('styles')
</head>
<body class="min-h-screen flex flex-col">
    <x-navbar />
    <main class="flex-1 flex flex-col justify-center">
        <div class="main-container">
            @if(session('success'))
                <div class="mb-4">
                    <x-alert type="success" dismissible>
                        {{ session('success') }}
                    </x-alert>
                </div>
            @endif
            @if(session('error'))
                <div class="mb-4">
                    <x-alert type="error" dismissible>
                        {{ session('error') }}
                    </x-alert>
                </div>
            @endif
            @yield('content')
        </div>
    </main>
    <x-footer />
    @stack('scripts')
    @yield('scripts')
</body>
</html>
