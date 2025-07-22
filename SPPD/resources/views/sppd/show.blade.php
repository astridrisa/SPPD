@extends('layouts.dashboard')

@section('title', 'Detail SPPD')
@section('header', 'Detail SPPD: ' . $sppd->nomor_sppd)

@section('actions')
    <div class="flex space-x-2">
        <a href="{{ route('sppd.edit', $sppd->id) }}" class="btn btn-warning">
            <i class="fas fa-edit mr-2"></i> Edit
        </a>
        <a href="{{ route('sppd.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>
@endsection

@section('main-content')
<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Informasi SPPD
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">
            Detail lengkap surat perintah perjalanan dinas
        </p>
    </div>
    <div class="px-4 py-5 sm:p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h4 class="text-md font-medium text-gray-900 mb-4">Data Pegawai</h4>
                <div class="flex items-center mb-4">
                    <div class="flex-shrink-0 h-16 w-16">
                        @if($sppd->user->profile_picture)
                            <img src="{{ asset('storage/' . $sppd->user->profile_picture) }}"
                                 alt="Profile Picture"
                                 class="w-16 h-16 rounded-full object-cover border-2 border-gray-200 shadow-sm">
                        @else
                            <div class="w-16 h-16 rounded-full bg-blue-500 flex items-center justify-center border-2 border-gray-200 shadow-sm">
                                <span class="text-white font-semibold text-lg">
                                    {{ substr($sppd->user->name, 0, 1) }}
                                </span>
                            </div>
                        @endif
            </div>
                    <div class="ml-4">
                        <div class="text-lg font-medium text-gray-900">{{ $sppd->user->name }}</div>
                        <div class="text-sm text-gray-500">{{ $sppd->user->nip }}</div>
                        <div class="text-sm text-gray-500">{{ $sppd->user->jabatan }}</div>
                    </div>
                </div>

                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Nomor SPPD</label>
                        <div class="mt-1 text-sm text-gray-900 font-medium">{{ $sppd->nomor_sppd }}</div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Tujuan Perjalanan</label>
                        <div class="mt-1 text-sm text-gray-900">{{ $sppd->tujuan }}</div>
                    </div>
                </div>
            </div>

            <div>
                <h4 class="text-md font-medium text-gray-900 mb-4">Detail Perjalanan</h4>
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Tanggal Berangkat</label>
                        <div class="mt-1 text-sm text-gray-900">
                            {{ $sppd->tanggal_berangkat->translatedFormat('l, d F Y') }}
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Tanggal Kembali</label>
                        <div class="mt-1 text-sm text-gray-900">
                            {{ $sppd->tanggal_kembali->translatedFormat('l, d F Y') }}
                            <span class="text-gray-500">({{ $sppd->tanggal_berangkat->diffInDays($sppd->tanggal_kembali) }} hari)</span>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Kendaraan</label>
                        <div class="mt-1 text-sm text-gray-900 capitalize">
                            {{ str_replace('_', ' ', $sppd->kendaraan) }}
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Status</label>
                        <div class="mt-1">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $sppd->status === 'approved' ? 'bg-green-100 text-green-800' : 
                                   ($sppd->status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                {{ ucfirst($sppd->status) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <h4 class="text-md font-medium text-gray-900 mb-4">Keterangan</h4>
            <div class="bg-gray-50 p-4 rounded-lg">
                @if($sppd->keterangan)
                    <p class="text-gray-800">{{ $sppd->keterangan }}</p>
                @else
                    <p class="text-gray-500 italic">Tidak ada keterangan tambahan</p>
                @endif
            </div>
        </div>

        <div class="mt-8 border-t border-gray-200 pt-6">
            <h4 class="text-md font-medium text-gray-900 mb-4">Riwayat Perubahan</h4>
            <div class="space-y-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-gray-600">
                            Dibuat pada {{ $sppd->created_at->translatedFormat('l, d F Y H:i') }}
                        </p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-gray-600">
                            Terakhir diupdate pada {{ $sppd->updated_at->translatedFormat('l, d F Y H:i') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection