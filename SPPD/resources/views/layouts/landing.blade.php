<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SPPD - Jasa Tirta')</title>

    <!-- Favicon (opsional) -->
    <link rel="icon" href="{{ asset('images/logo-jasatirta.png') }}" type="image/png">

    <!-- Tailwind -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        inter: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Tambahan CSS (kalau perlu) -->
    @stack('styles')
</head>
<body class="bg-white text-gray-800 antialiased">
    @yield('content')

    @stack('scripts')
</body>
</html>
