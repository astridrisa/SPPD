@extends('layouts.app')

@section('content')
<div class="flex flex-col lg:flex-row min-h-screen bg-gray-50">
    
    <!-- Sidebar -->
    <aside class="bg-gradient-to-b from-blue-800 via-blue-900 to-indigo-900 text-white w-full lg:w-72 min-h-screen shadow-2xl">

        <!-- Navigasi -->
        <nav class="mt-1 flex-1">
            <ul class="space-y-2 px-4" x-data="{ activeMenu: '{{ request()->segment(1) }}' }">
                <!-- Dashboard -->
                <li>
                    <a href="{{ route('dashboard') }}" 
                       class="nav-item group flex items-center p-4 rounded-xl text-base font-semibold transition-all duration-300 hover:bg-blue-700/50 hover:scale-105 hover:shadow-lg
                              {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-blue-600 to-blue-500 shadow-lg transform scale-105 ring-2 ring-blue-400/50' : '' }}">
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-600/30 mr-4 group-hover:bg-blue-500/50 transition-colors duration-300">
                            <i class="fas fa-tachometer-alt text-xl {{ request()->routeIs('dashboard') ? 'text-white' : 'text-blue-200' }}"></i>
                        </div>
                        <span class="text-base {{ request()->routeIs('dashboard') ? 'text-white' : 'text-blue-100' }}">Dashboard</span>
                        @if(request()->routeIs('dashboard'))
                            <div class="ml-auto">
                                <i class="fas fa-chevron-right text-blue-200"></i>
                            </div>
                        @endif
                    </a>
                </li>

                <!-- Kelola Pegawai -->
                {{-- <li>
                    <a href="{{ route('pegawai.index') }}" 
                       class="nav-item group flex items-center p-4 rounded-xl text-base font-semibold transition-all duration-300 hover:bg-blue-700/50 hover:scale-105 hover:shadow-lg
                              {{ request()->routeIs('pegawai.*') ? 'bg-gradient-to-r from-blue-600 to-blue-500 shadow-lg transform scale-105 ring-2 ring-blue-400/50' : '' }}">
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-600/30 mr-4 group-hover:bg-blue-500/50 transition-colors duration-300">
                            <i class="fas fa-file-alt text-xl {{ request()->routeIs('pegawai.*') ? 'text-white' : 'text-blue-200' }}"></i>
                        </div>
                        <span class="text-base {{ request()->routeIs('pegawai.*') ? 'text-white' : 'text-blue-100' }}">Kelola Pegawai</span>
                        @if(request()->routeIs('pegawai.*'))
                            <div class="ml-auto">
                                <i class="fas fa-chevron-right text-blue-200"></i>
                            </div>
                        @endif
                    </a>
                </li> --}}

                <!-- Kelola SPPD -->
                <li>
                    <a href="{{ route('sppd.index') }}" 
                       class="nav-item group flex items-center p-4 rounded-xl text-base font-semibold transition-all duration-300 hover:bg-blue-700/50 hover:scale-105 hover:shadow-lg
                              {{ request()->routeIs('sppd.*') ? 'bg-gradient-to-r from-blue-600 to-blue-500 shadow-lg transform scale-105 ring-2 ring-blue-400/50' : '' }}">
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-600/30 mr-4 group-hover:bg-blue-500/50 transition-colors duration-300">
                            <i class="fas fa-file-alt text-xl {{ request()->routeIs('sppd.*') ? 'text-white' : 'text-blue-200' }}"></i>
                        </div>
                        <span class="text-base {{ request()->routeIs('sppd.*') ? 'text-white' : 'text-blue-100' }}">Kelola SPPD</span>
                        @if(request()->routeIs('sppd.*'))
                            <div class="ml-auto">
                                <i class="fas fa-chevron-right text-blue-200"></i>
                            </div>
                        @endif
                    </a>
                </li>

                <!-- Manajemen User -->
                @can('manage-users')
                <li>
                    <a href="#" 
                       class="nav-item group flex items-center p-4 rounded-xl text-base font-semibold transition-all duration-300 hover:bg-blue-700/50 hover:scale-105 hover:shadow-lg">
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-600/30 mr-4 group-hover:bg-blue-500/50 transition-colors duration-300">
                            <i class="fas fa-users-cog text-xl text-blue-200"></i>
                        </div>
                        <span class="text-base text-blue-100">Manajemen User</span>
                    </a>
                </li>
                @endcan

                <!-- Divider -->
                <li class="py-4">
                    <div class="border-t border-blue-700/50"></div>
                </li>

                <!-- Pengaturan Akun -->
                <li>
                    <a href="{{ route('profile.edit') }}" 
                       class="nav-item group flex items-center p-4 rounded-xl text-base font-semibold transition-all duration-300 hover:bg-blue-700/50 hover:scale-105 hover:shadow-lg
                              {{ request()->routeIs('profile.*') ? 'bg-gradient-to-r from-blue-600 to-blue-500 shadow-lg transform scale-105 ring-2 ring-blue-400/50' : '' }}">
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-600/30 mr-4 group-hover:bg-blue-500/50 transition-colors duration-300">
                            <i class="fas fa-user-cog text-xl {{ request()->routeIs('profile.*') ? 'text-white' : 'text-blue-200' }}"></i>
                        </div>
                        <span class="text-base {{ request()->routeIs('profile.*') ? 'text-white' : 'text-blue-100' }}">Pengaturan Akun</span>
                        @if(request()->routeIs('profile.*'))
                            <div class="ml-auto">
                                <i class="fas fa-chevron-right text-blue-200"></i>
                            </div>
                        @endif
                    </a>
                </li>

                <!-- Logout -->
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" 
                                class="nav-item group flex items-center p-4 rounded-xl text-base font-semibold transition-all duration-300 hover:bg-red-600/50 hover:scale-105 hover:shadow-lg w-full text-left">
                            <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-red-600/30 mr-4 group-hover:bg-red-500/50 transition-colors duration-300">
                                <i class="fas fa-sign-out-alt text-xl text-red-200"></i>
                            </div>
                            <span class="text-base text-red-100 group-hover:text-white">Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 lg:p-8">
        <!-- Page Header -->
        <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8">
            <div>
                <h1 class="text-2xl lg:text-3xl font-bold text-gray-800 mb-2">
                    @yield('header')
                </h1>
                <p class="text-gray-600 text-base">
                    @yield('subtitle', 'Selamat datang di sistem SPPD Jasa Tirta')
                </p>
            </div>
            <div class="mt-4 md:mt-0">
                @yield('actions')
            </div>
        </div>

        <!-- Flash Messages -->
        @if (session('success'))
            <div class="bg-gradient-to-r from-green-50 to-green-100 border-l-4 border-green-500 text-green-800 p-6 mb-6 rounded-lg shadow-lg" role="alert">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-xl mr-3"></i>
                    <div>
                        <h3 class="font-semibold text-base">Berhasil!</h3>
                        <p class="text-sm">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-gradient-to-r from-red-50 to-red-100 border-l-4 border-red-500 text-red-800 p-6 mb-6 rounded-lg shadow-lg" role="alert">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle text-xl mr-3"></i>
                    <div>
                        <h3 class="font-semibold text-base">Error!</h3>
                        <p class="text-sm">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Content -->
        <div class="bg-white rounded-xl shadow-lg p-6 lg:p-8">
            @yield('main-content')
        </div>
    </main>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('sidebar', {
            open: window.innerWidth >= 768,
            toggle() {
                this.open = !this.open
            }
        })
    })

    // Add click animation to nav items
    document.querySelectorAll('.nav-item').forEach(item => {
        item.addEventListener('click', function() {
            // Add ripple effect
            this.style.transform = 'scale(0.98)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
        });
    });
</script>
@endpush

@push('styles')
<style>
    /* Custom scrollbar for sidebar */
    aside::-webkit-scrollbar {
        width: 4px;
    }

    aside::-webkit-scrollbar-track {
        background: rgba(59, 130, 246, 0.1);
    }

    aside::-webkit-scrollbar-thumb {
        background: rgba(59, 130, 246, 0.5);
        border-radius: 2px;
    }

    aside::-webkit-scrollbar-thumb:hover {
        background: rgba(59, 130, 246, 0.7);
    }

    /* Smooth transitions for all interactive elements */
    .nav-item {
        position: relative;
        overflow: hidden;
    }

    .nav-item:hover::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
        transform: translateX(-100%);
        animation: shimmer 0.6s ease-in-out;
    }

    @keyframes shimmer {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    /* Responsive text sizing */
    @media (max-width: 768px) {
        .nav-item span {
            font-size: 1rem;
        }
    }
</style>
@endpush