<head>
    <title>@yield('title', 'SPPD Jasa Tirta')</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Favicon (opsional) -->
    <link rel="icon" href="{{ asset('images/logo-jasatirta.png') }}" type="image/png">
</head>

<body class="bg-gradient-to-br from-blue-50 to-white min-h-screen flex flex-col items-center justify-center px-4 py-6">

    {{-- Card --}}
    <div class="w-full max-w-md bg-white rounded-xl shadow-xl border border-blue-100 p-6 sm:p-8">
        @yield('content')
    </div>

    {{-- Footer --}}
    <footer class="mt-6 text-xs text-gray-500 text-center">
        &copy; {{ date('Y') }} Jasa Tirta | Sistem SPPD
    </footer>

</body>
