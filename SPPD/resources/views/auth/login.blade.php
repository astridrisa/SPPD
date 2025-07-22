@extends('layouts.guest')

@section('title', 'Login - SPPD Jasa Tirta')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-white px-4">
    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md border">
        {{-- Logo Jasa Tirta --}}
        <div class="text-center mb-4">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo-jasatirta.png') }}" alt="Logo Jasa Tirta" class="h-14 mx-auto shadow-md rounded-lg">
            </a>
        </div>
        <div class="text-center mb-6">
            <h2 class="mt-4 text-xl font-semibold text-gray-800">Login ke Sistem SPPD</h2>
            <p class="text-sm text-gray-500">Manajemen Surat Perintah Perjalanan Dinas</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-3 rounded mb-4 text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" required
                    class="mt-1 w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="email@jasatirta.com">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required
                    class="mt-1 w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="••••••••">
            </div>

            <div class="flex justify-between items-center text-sm">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="h-4 w-4 text-blue-600">
                    <span class="ml-2 text-gray-600">Ingat saya</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">Lupa password?</a>
            </div>

            <button type="submit"
                class="w-full py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition text-sm font-medium">
                Masuk
            </button>
        </form>

        <div class="text-center text-sm text-gray-600 mt-4">
            Belum punya akun? 
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Daftar disini</a>
        </div>
    </div>
</div>
@endsection
