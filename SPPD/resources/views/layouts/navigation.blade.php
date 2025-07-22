<nav x-data="{ open: false, profileOpen: false }" class="bg-gradient-to-r from-blue-800 to-blue-900 border-b border-blue-700 shadow-lg">
    <div class="w-full px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Kiri: Logo -->
            <div class="flex items-center gap-4">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 hover:opacity-80 transition duration-150">
                    <img src="{{ asset('images/logo-jasatirta.png') }}" alt="Logo Jasa Tirta" class="h-10 w-auto rounded-lg shadow-md">
                    <div class="leading-tight">
                        <span class="text-base font-bold text-white">Jasa Tirta</span>
                        <p class="text-[11px] text-blue-200 -mt-1">SPPD System</p>
                    </div>
                </a>
            </div>

            <!-- Container Flex untuk Profile Picture dan Info Akun -->
            <div class="hidden md:flex items-center space-x-3 mr-2">
                <!-- Profile Picture atau Inisial -->
                @if(Auth::user()->profile_picture)
                    <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" 
                        alt="Profile Picture" 
                        class="w-10 h-10 rounded-full object-cover border-2 border-white shadow-sm">
                @else
                    <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center border-2 border-white shadow-sm">
                        <span class="text-white font-semibold text-sm">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </span>
                    </div>
                @endif

                <!-- Info Akun -->
                <div class="text-white text-sm text-right">
                    <div class="font-medium">{{ Auth::user()->name }}</div>
                    <div class="text-blue-200 text-xs">{{ Auth::user()->email }}</div>
                </div>
            </div>
        </div>
    </div>
</nav>
