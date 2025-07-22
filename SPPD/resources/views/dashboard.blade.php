@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('header', 'Dashboard SPPD')

@section('main-content')
    <!-- Welcome Section -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl shadow-lg p-8 mb-8 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold mb-2">Selamat Datang!</h1>
                <p class="text-blue-100 text-lg">Kelola SPPD Anda dengan mudah dan efisien</p>
            </div>
            <div class="hidden md:block">
                <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center">
                    <i class="fas fa-chart-line text-3xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total SPPD Card -->
        <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium uppercase tracking-wider">Total SPPD</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalSppd ?? 0 }}</p>
                    <div class="flex items-center mt-2">
                        <i class="fas fa-arrow-up text-green-500 text-sm mr-1"></i>
                        <span class="text-green-500 text-sm font-medium">+12%</span>
                    </div>
                </div>
                <div class="p-4 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-600 text-white">
                    <i class="fas fa-file-alt text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Approved SPPD Card -->
        <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium uppercase tracking-wider">Disetujui</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $approvedSppd ?? 0 }}</p>
                    <div class="flex items-center mt-2">
                        <i class="fas fa-arrow-up text-green-500 text-sm mr-1"></i>
                        <span class="text-green-500 text-sm font-medium">+8%</span>
                    </div>
                </div>
                <div class="p-4 rounded-2xl bg-gradient-to-br from-green-500 to-green-600 text-white">
                    <i class="fas fa-check-circle text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Pending SPPD Card -->
        <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium uppercase tracking-wider">Pending</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $pendingSppd ?? 0 }}</p>
                    <div class="flex items-center mt-2">
                        <i class="fas fa-minus text-yellow-500 text-sm mr-1"></i>
                        <span class="text-yellow-500 text-sm font-medium">0%</span>
                    </div>
                </div>
                <div class="p-4 rounded-2xl bg-gradient-to-br from-yellow-500 to-yellow-600 text-white">
                    <i class="fas fa-clock text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Rejected SPPD Card -->
        <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium uppercase tracking-wider">Ditolak</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $rejectedSppd ?? 0 }}</p>
                    <div class="flex items-center mt-2">
                        <i class="fas fa-arrow-down text-red-500 text-sm mr-1"></i>
                        <span class="text-red-500 text-sm font-medium">-5%</span>
                    </div>
                </div>
                <div class="p-4 rounded-2xl bg-gradient-to-br from-red-500 to-red-600 text-white">
                    <i class="fas fa-times-circle text-2xl"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Recent SPPD -->
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-gray-100">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-semibold text-gray-900 flex items-center">
                        <i class="fas fa-history text-blue-600 mr-3"></i>
                        SPPD Terbaru
                    </h3>
                    <a href="{{ route('sppd.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                        Lihat Semua →
                    </a>
                </div>
            </div>
            <div class="max-h-96 overflow-y-auto">
                @forelse($recentSppds ?? [] as $sppd)
                <div class="px-6 py-4 hover:bg-gray-50 transition-colors duration-200 border-l-4 border-transparent hover:border-blue-500">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <a href="{{ route('sppd.show', $sppd->id) }}" class="text-base font-semibold text-blue-600 hover:text-blue-800 transition-colors">
                                {{ $sppd->nomor_sppd }}
                            </a>
                            <div class="flex items-center mt-2 text-sm text-gray-600">
                                <i class="fas fa-user mr-2"></i>
                                <span class="font-medium">{{ $sppd->user->name }}</span>
                                <span class="mx-2">•</span>
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                <span>{{ $sppd->tujuan }}</span>
                            </div>
                            <div class="flex items-center mt-1 text-xs text-gray-500">
                                <i class="fas fa-calendar mr-2"></i>
                                <span>{{ $sppd->created_at->format('d M Y, H:i') }}</span>
                            </div>
                        </div>
                        <div class="ml-4">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $sppd->status === 'approved' ? 'bg-green-100 text-green-800' : 
                                   ($sppd->status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                {{ ucfirst($sppd->status) }}
                            </span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="px-6 py-12 text-center">
                    <i class="fas fa-inbox text-gray-300 text-4xl mb-4"></i>
                    <p class="text-gray-500 text-lg">Belum ada data SPPD</p>
                    <p class="text-gray-400 text-sm mt-1">Data SPPD akan muncul di sini setelah dibuat</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- SPPD Status Chart -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-gray-100">
                <h3 class="text-xl font-semibold text-gray-900 flex items-center">
                    <i class="fas fa-chart-pie text-purple-600 mr-3"></i>
                    Statistik SPPD
                </h3>
            </div>
            <div class="p-6">
                <div class="relative">
                    <canvas id="sppdChart" height="200"></canvas>
                </div>
                <div class="mt-6 space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-green-500 rounded-full mr-3"></div>
                            <span class="text-sm font-medium text-gray-700">Disetujui</span>
                        </div>
                        <span class="text-sm font-semibold text-gray-900">{{ $approvedSppd ?? 0 }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-yellow-500 rounded-full mr-3"></div>
                            <span class="text-sm font-medium text-gray-700">Pending</span>
                        </div>
                        <span class="text-sm font-semibold text-gray-900">{{ $pendingSppd ?? 0 }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-red-500 rounded-full mr-3"></div>
                            <span class="text-sm font-medium text-gray-700">Ditolak</span>
                        </div>
                        <span class="text-sm font-semibold text-gray-900">{{ $rejectedSppd ?? 0 }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-semibold text-gray-900 flex items-center">
                <i class="fas fa-bolt text-yellow-600 mr-3"></i>
                Aksi Cepat
            </h3>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="{{ route('sppd.create') }}" class="flex items-center p-4 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-200 transform hover:scale-105">
                <i class="fas fa-plus-circle text-2xl mr-4"></i>
                <div>
                    <p class="font-semibold">Buat SPPD Baru</p>
                    <p class="text-sm text-blue-100">Ajukan perjalanan dinas</p>
                </div>
            </a>
            <a href="{{ route('sppd.index') }}" class="flex items-center p-4 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl hover:from-green-600 hover:to-green-700 transition-all duration-200 transform hover:scale-105">
                <i class="fas fa-list text-2xl mr-4"></i>
                <div>
                    <p class="font-semibold">Lihat Semua SPPD</p>
                    <p class="text-sm text-green-100">Kelola semua perjalanan</p>
                </div>
            </a>
            <a href="{{ route('reports.index') }}" class="flex items-center p-4 bg-gradient-to-r from-purple-500 to-purple-600 text-white rounded-xl hover:from-purple-600 hover:to-purple-700 transition-all duration-200 transform hover:scale-105">
                <i class="fas fa-chart-bar text-2xl mr-4"></i>
                <div>
                    <p class="font-semibold">Laporan</p>
                    <p class="text-sm text-purple-100">Analisis & statistik</p>
                </div>
            </a>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .animate-pulse-slow {
        animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .fade-in-up {
        animation: fadeInUp 0.5s ease-out;
    }
    
    .hover-glow:hover {
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('sppdChart').getContext('2d');
        
        // Create gradient for chart
        const gradient1 = ctx.createLinearGradient(0, 0, 0, 400);
        gradient1.addColorStop(0, '#10B981');
        gradient1.addColorStop(1, '#059669');
        
        const gradient2 = ctx.createLinearGradient(0, 0, 0, 400);
        gradient2.addColorStop(0, '#F59E0B');
        gradient2.addColorStop(1, '#D97706');
        
        const gradient3 = ctx.createLinearGradient(0, 0, 0, 400);
        gradient3.addColorStop(0, '#EF4444');
        gradient3.addColorStop(1, '#DC2626');
        
        const sppdChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Disetujui', 'Pending', 'Ditolak'],
                datasets: [{
                    data: [
                        {{ $approvedSppd ?? 0 }}, 
                        {{ $pendingSppd ?? 0 }}, 
                        {{ $rejectedSppd ?? 0 }}
                    ],
                    backgroundColor: [
                        gradient1,
                        gradient2,
                        gradient3
                    ],
                    borderWidth: 0,
                    hoverOffset: 8,
                    cutout: '70%'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        borderColor: '#4F46E5',
                        borderWidth: 1,
                        cornerRadius: 8,
                        displayColors: false,
                        callbacks: {
                            label: function(context) {
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = ((context.parsed * 100) / total).toFixed(1);
                                return `${context.label}: ${context.parsed} (${percentage}%)`;
                            }
                        }
                    }
                },
                animation: {
                    animateScale: true,
                    animateRotate: true,
                    duration: 1000,
                    easing: 'easeOutCubic'
                }
            }
        });
        
        // Add animation classes to cards
        const cards = document.querySelectorAll('.grid > div');
        cards.forEach((card, index) => {
            card.classList.add('fade-in-up');
            card.style.animationDelay = `${index * 0.1}s`;
        });
    });
</script>
@endpush