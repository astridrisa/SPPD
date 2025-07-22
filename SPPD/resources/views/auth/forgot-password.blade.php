@extends('layouts.guest')

@section('title', 'Forgot Password - SPPD Jasa Tirta')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-white px-4">
    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md border">
        {{-- Logo --}}
        <div class="text-center mb-4">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo-jasatirta.png') }}" alt="Logo Jasa Tirta" class="h-14 mx-auto shadow-md rounded-lg">
            </a>
        </div>
        <div class="text-center mb-6">
            <h2 class="text-xl font-semibold text-gray-800">Lupa Password?</h2>
            <p class="text-sm text-gray-500">Masukkan email untuk menerima link reset password</p>
        </div>

        @if (session('status'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-3 rounded mb-4 text-sm">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-3 rounded mb-4 text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" required autofocus
                    class="mt-1 w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="email@jasatirta.com">
            </div>

            <button type="submit"
                class="w-full py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition text-sm font-medium">
                Kirim Link Reset Password
            </button>
        </form>

        <div class="text-center text-sm text-gray-600 mt-4">
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Kembali ke login</a>
        </div>
    </div>
</div>
@endsection
