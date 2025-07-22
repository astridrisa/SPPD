@extends('layouts.landing')

@section('content')
<div class="bg-white min-h-screen">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        
        .fade-in {
            animation: fadeIn 0.8s ease-in;
        }
        
        .slide-up {
            animation: slideUp 0.8s ease-out;
        }
        
        .bounce-in {
            animation: bounceIn 1s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideUp {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        @keyframes bounceIn {
            0% { transform: scale(0.3); opacity: 0; }
            50% { transform: scale(1.05); }
            70% { transform: scale(0.9); }
            100% { transform: scale(1); opacity: 1; }
        }
        
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .pulse-glow {
            animation: pulseGlow 2s infinite;
        }
        
        @keyframes pulseGlow {
            0%, 100% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.3); }
            50% { box-shadow: 0 0 30px rgba(59, 130, 246, 0.6); }
        }
        
        .text-gradient {
            background: linear-gradient(45deg, #3b82f6, #8b5cf6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .nav-glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .parallax-bg {
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 200"><defs><linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" style="stop-color:%23667eea;stop-opacity:0.1" /><stop offset="100%" style="stop-color:%23764ba2;stop-opacity:0.1" /></linearGradient></defs><path d="M0,100 Q250,50 500,100 T1000,100 L1000,200 L0,200 Z" fill="url(%23grad1)"/></svg>');
            background-size: cover;
            background-position: center;
        }
    </style>

    <!-- Navbar -->
    <header class="nav-glass fixed w-full z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 py-4 sm:px-6 flex justify-between items-center">
            <div class="flex items-center space-x-3 fade-in">
                <img src="{{ asset('images/logo-jasatirta.png') }}" alt="Logo Jasa Tirta" class="h-12 w-auto rounded-lg shadow-md">
                <div>
                    <span class="text-xl font-bold text-gray-800">Jasa Tirta</span>
                    <p class="text-xs text-gray-600">SPPD System</p>
                </div>
            </div>
            <div class="fade-in">
                <a href="{{ route('login') }}" class="text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 px-6 py-3 rounded-full text-sm font-medium shadow-lg transform hover:scale-105 transition-all duration-300 pulse-glow">
                    <i class="fas fa-sign-in-alt mr-2"></i>Login
                </a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="gradient-bg min-h-screen flex items-center relative overflow-hidden">
        <!-- Animated background elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-10 -right-10 w-72 h-72 bg-white opacity-10 rounded-full floating"></div>
            <div class="absolute top-1/2 -left-20 w-96 h-96 bg-white opacity-5 rounded-full floating" style="animation-delay: 1s;"></div>
            <div class="absolute bottom-10 right-1/3 w-48 h-48 bg-white opacity-10 rounded-full floating" style="animation-delay: 2s;"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 py-20 sm:px-6 lg:px-8 flex flex-col-reverse lg:flex-row items-center relative z-10">
            <div class="lg:w-1/2 slide-up">
                <h1 class="text-5xl font-bold text-white sm:text-6xl lg:text-7xl leading-tight">
                    Sistem SPPD
                    <span class="block text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-orange-500">
                        Digital
                    </span>
                </h1>
                <p class="mt-6 text-xl text-blue-100 leading-relaxed">
                    Revolusi pengelolaan Surat Perintah Perjalanan Dinas dengan teknologi modern. 
                    Efisien, cepat, dan terintegrasi untuk kebutuhan organisasi Anda.
                </p>
                <div class="mt-8 flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center bg-white text-blue-600 hover:bg-gray-100 px-8 py-4 rounded-full text-lg font-semibold shadow-xl transform hover:scale-105 transition-all duration-300">
                        <i class="fas fa-rocket mr-3"></i>
                        Mulai Sekarang
                    </a>
                    <a href="#features" class="inline-flex items-center justify-center border-2 border-white text-white hover:bg-white hover:text-blue-600 px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300">
                        <i class="fas fa-play mr-3"></i>
                        Lihat Fitur
                    </a>
                </div>
            </div>
            <div class="lg:w-1/2 mb-10 lg:mb-0 bounce-in">
                <div class="relative">
                    <!-- Hero Image -->
                    <div class="relative max-w-md mx-auto">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="bg-white py-20 parallax-bg">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 slide-up">
                <h2 class="text-4xl font-bold text-gradient mb-4">Fitur Unggulan</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Solusi lengkap untuk mengelola perjalanan dinas dengan teknologi terdepan
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="card-hover bg-white rounded-2xl p-8 shadow-lg border border-gray-100 text-center fade-in">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-file-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Pembuatan SPPD</h3>
                    <p class="text-gray-600 mb-6">
                        Input dan cetak surat perjalanan dinas secara instan dengan template yang dapat disesuaikan.
                    </p>
                    <img src="{{ asset('images/feature-sppd.png') }}" alt="Feature SPPD" class="w-full h-32 object-cover rounded-lg mb-4">
                    <div class="flex justify-center space-x-2">
                        <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">Template</span>
                        <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">Otomatis</span>
                    </div>
                </div>
                
                <div class="card-hover bg-white rounded-2xl p-8 shadow-lg border border-gray-100 text-center fade-in" style="animation-delay: 0.2s;">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-user-check text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Persetujuan Online</h3>
                    <p class="text-gray-600 mb-6">
                        Pengajuan dan persetujuan dilakukan secara digital dengan notifikasi real-time.
                    </p>
                    <img src="{{ asset('images/feature-approval.png') }}" alt="Feature Approval" class="w-full h-32 object-cover rounded-lg mb-4">
                    <div class="flex justify-center space-x-2">
                        <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">Real-time</span>
                        <span class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm">Tracking</span>
                    </div>
                </div>
                
                <div class="card-hover bg-white rounded-2xl p-8 shadow-lg border border-gray-100 text-center fade-in" style="animation-delay: 0.4s;">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-database text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Manajemen Data</h3>
                    <p class="text-gray-600 mb-6">
                        Data perjalanan tersimpan dan mudah dicari kapan saja dengan laporan lengkap.
                    </p>
                    <img src="{{ asset('images/feature-data.png') }}" alt="Feature Data Management" class="w-full h-32 object-cover rounded-lg mb-4">
                    <div class="flex justify-center space-x-2">
                        <span class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm">Dashboard</span>
                        <span class="px-3 py-1 bg-orange-100 text-orange-800 rounded-full text-sm">Laporan</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section with Images -->
    <section class="bg-gray-50 py-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="slide-up">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Mengapa Memilih Sistem SPPD Digital?</h2>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">Efisiensi Waktu</h3>
                                <p class="text-gray-600">Proses persetujuan yang lebih cepat dan otomatis</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">Paperless</h3>
                                <p class="text-gray-600">Mengurangi penggunaan kertas dan ramah lingkungan</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">Transparency</h3>
                                <p class="text-gray-600">Tracking real-time dan transparansi penuh</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="bg-gray-900 py-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-white mb-4">Dipercaya Oleh Ribuan Pengguna</h2>
                <p class="text-gray-400">Statistik penggunaan sistem SPPD Jasa Tirta</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div class="fade-in">
                    <div class="text-4xl font-bold text-white mb-2">1000+</div>
                    <div class="text-blue-400">SPPD Diproses</div>
                </div>
                <div class="fade-in" style="animation-delay: 0.1s;">
                    <div class="text-4xl font-bold text-white mb-2">50+</div>
                    <div class="text-green-400">Departemen</div>
                </div>
                <div class="fade-in" style="animation-delay: 0.2s;">
                    <div class="text-4xl font-bold text-white mb-2">99%</div>
                    <div class="text-purple-400">Uptime</div>
                </div>
                <div class="fade-in" style="animation-delay: 0.3s;">
                    <div class="text-4xl font-bold text-white mb-2">24/7</div>
                    <div class="text-orange-400">Support</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-gradient-to-r from-blue-600 to-purple-600 py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl font-bold text-white mb-6 slide-up">
                Siap Memulai Transformasi Digital?
            </h2>
            <p class="text-xl text-blue-100 mb-8 slide-up">
                Bergabunglah dengan ribuan organisasi yang telah merasakan kemudahan sistem SPPD digital
            </p>
            <div class="slide-up">
                <a href="{{ route('login') }}" class="inline-flex items-center justify-center bg-white text-blue-600 hover:bg-gray-100 px-8 py-4 rounded-full text-lg font-semibold shadow-xl transform hover:scale-105 transition-all duration-300">
                    <i class="fas fa-rocket mr-3"></i>
                    Mulai Sekarang
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <img src="{{ asset('images/logo-jasatirta.png') }}" alt="Logo Jasa Tirta" class="h-10 w-auto">
                        <div>
                            <span class="text-xl font-bold text-white">Jasa Tirta</span>
                            <p class="text-sm text-gray-400">SPPD System</p>
                        </div>
                    </div>
                    <p class="text-gray-400">
                        Sistem manajemen SPPD terdepan untuk organisasi modern dengan teknologi digital terkini.
                    </p>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold text-white mb-4">Fitur</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Pembuatan SPPD</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Approval System</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Reporting</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Analytics</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold text-white mb-4">Kontak</h3>
                    <div class="space-y-2 text-gray-400">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-envelope"></i>
                            <span>support@jasatirta.com</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-phone"></i>
                            <span>+62 21 123 4567</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Jakarta, Indonesia</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} Jasa Tirta | Sistem Manajemen SPPD - Semua hak dilindungi</p>
            </div>
        </div>
    </footer>
</div>

<script>
// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Navbar scroll effect
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('header');
    if (window.scrollY > 50) {
        navbar.classList.add('shadow-lg');
    } else {
        navbar.classList.remove('shadow-lg');
    }
});

// Intersection Observer for animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.animationPlayState = 'running';
        }
    });
}, observerOptions);

document.querySelectorAll('.fade-in, .slide-up, .bounce-in').forEach(el => {
    observer.observe(el);
});
</script>

<!-- Add Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<!-- Add Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>
@endsection