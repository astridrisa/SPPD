@extends('layouts.dashboard')

@section('title', 'Pengaturan Profil')
@section('header', 'Profil Pengguna')
@section('subtitle', 'Kelola data dan keamanan akun Anda')

@section('main-content')
    <div class="max-w-3xl mx-auto space-y-8">
        {{-- Profil --}}
        <form method="POST" action="{{ route('profile.update') }}" class="bg-white p-6 rounded-xl shadow-md space-y-6">
            @csrf
            @method('PATCH')

            <h2 class="text-lg font-semibold text-gray-800 border-b pb-2">Informasi Akun</h2>

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus
                    class="mt-1 w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required
                    class="mt-1 w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div class="mt-2 text-sm text-red-600">
                        Email belum diverifikasi.
                        <form method="POST" action="{{ route('verification.send') }}" class="inline">
                            @csrf
                            <button type="submit" class="underline text-blue-600 hover:text-blue-800 ml-1">
                                Klik untuk verifikasi ulang
                            </button>
                        </form>
                    </div>
                @else
                    <p class="mt-2 text-sm text-green-600">Email telah terverifikasi</p>
                @endif
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded shadow transition">
                    Simpan Perubahan
                </button>
            </div>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                    class="text-green-600 text-sm mt-2">Profil berhasil diperbarui.</p>
            @endif
        </form>

        {{-- Hapus Akun --}}
        <form method="POST" action="{{ route('profile.destroy') }}" class="bg-white p-6 rounded-xl shadow-md">
            @csrf
            @method('DELETE')

            <h2 class="text-lg font-semibold text-red-700 border-b pb-2">Hapus Akun</h2>
            <p class="text-sm text-gray-600 mb-4">
                Setelah akun Anda dihapus, semua data akan dihapus secara permanen. Tindakan ini tidak dapat dibatalkan.
            </p>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input id="password" name="password" type="password" required
                    class="mt-1 w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-400"
                    placeholder="••••••••">
            </div>

            <button type="submit"
                onclick="return confirm('Apakah Anda yakin ingin menghapus akun?')"
                class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded shadow transition">
                Hapus Akun
            </button>
        </form>
    </div>
@endsection
