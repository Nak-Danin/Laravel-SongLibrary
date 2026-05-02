<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music app - {{ $heading }}</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        * {
            font-family: 'DM Sans', sans-serif;
        }

        .font-display {
            font-family: 'Syne', sans-serif;
        }

        .nav-active {
            background: #1e293b;
            color: #ffffff;
            font-weight: 600;
        }

        .table-row-hover:hover {
            background: rgba(99, 102, 241, 0.06);
            transition: background 0.15s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
        }

        .btn-danger {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            transition: all 0.2s ease;
        }

        .btn-danger:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.4);
        }

        .card-glow {
            box-shadow: 0 0 0 1px rgba(99, 102, 241, 0.1), 0 4px 24px rgba(0, 0, 0, 0.06);
        }

        .input-focus:focus {
            outline: none;
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15);
        }

        .stat-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8faff 100%);
            border: 1px solid rgba(99, 102, 241, 0.12);
        }

        .badge {
            font-family: 'Syne', sans-serif;
            letter-spacing: 0.05em;
        }

        .sidebar-icon {
            transition: transform 0.2s ease;
        }

        .sidebar-icon:hover {
            transform: scale(1.1);
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(12px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-up {
            animation: fadeUp 0.4s ease forwards;
        }

        .delay-1 {
            animation-delay: 0.05s;
            opacity: 0;
        }

        .delay-2 {
            animation-delay: 0.1s;
            opacity: 0;
        }

        .delay-3 {
            animation-delay: 0.15s;
            opacity: 0;
        }

        .delay-4 {
            animation-delay: 0.2s;
            opacity: 0;
        }
    </style>
    @stack('styles')
</head>

<body>
    <nav x-data="{ open: false }" class="sticky top-0 z-50 md:static md:top-auto md:z-auto bg-gray-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">

                <!-- Mobile menu button -->
                <button @click="open = !open"
                    class="sm:hidden p-2 text-gray-400 hover:text-white hover:bg-white/5 rounded-md">

                    <span class="sr-only">Toggle menu</span>

                    <!-- Hamburger -->
                    <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" />
                    </svg>

                    <!-- X -->
                    <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" />
                    </svg>
                </button>

                <div class="flex justify-center md:justify-start">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <img src="{{ asset('images/logoSong.png') }}" class="h-10 w-auto" />
                    </div>

                    <!-- Desktop menu -->
                    <div class="hidden sm:flex space-x-4">
                        <x-nav-link href="/" :active="request()->is('/')" class="px-3 py-2 text-white rounded-md bg-gray-900">
                            Dashboard
                        </x-nav-link>

                        <x-nav-link href="/songs" :active="request()->is('songs')" class="px-3 py-2 text-gray-300 hover:text-white hover:bg-white/5 rounded-md">
                            Library
                        </x-nav-link>

                        <x-nav-link href="/favorites" :active="request()->is('favorites')" class="px-3 py-2 text-gray-300 hover:text-white hover:bg-white/5 rounded-md">
                            Favorites
                        </x-nav-link>
                    </div>

                </div>
                <!-- Right side -->
                <div class="flex items-center gap-3">

                    <!-- Notifications -->
                    <button class="text-gray-400 hover:text-white">
                        🔔
                    </button>

                    <!-- Profile -->
                    <img src="{{ asset('images/profile.png') }}"
                        class="w-8 h-8 rounded-full object-cover border border-white/10">
                </div>
            </div>
        </div>

        <!-- Overlay background -->
        <div
            x-show="open"
            x-transition.opacity
            class="fixed inset-0 bg-black/40 z-40 sm:hidden"
            @click="open = false">
        </div>

        <!-- Slide-in menu -->
        <div
            x-show="open"
            x-transition:enter="transition transform duration-300 ease-out"
            x-transition:enter-start="-translate-y-10 opacity-0"
            x-transition:enter-end="translate-y-0 opacity-100"
            x-transition:leave="transition transform duration-200 ease-in"
            x-transition:leave-start="translate-y-0 opacity-100"
            x-transition:leave-end="-translate-y-10 opacity-0"
            class="fixed top-16 left-0 right-0 z-50 sm:hidden bg-gray-800 shadow-lg">

            <div class="px-4 py-3 space-y-2">

                <x-nav-link href="/" :active="request()->is('/')" class="block px-3 py-2 text-white rounded-md hover:bg-white/5">
                    Dashboard
                </x-nav-link>

                <x-nav-link href="/songs" :active="request()->is('songs')" class="block px-3 py-2 text-gray-300 hover:text-white hover:bg-white/5 rounded-md">
                    Library
                </x-nav-link>

                <x-nav-link href="/favorites" :active="request()->is('favorites')" class="block px-3 py-2 text-gray-300 hover:text-white hover:bg-white/5 rounded-md">
                    Favorites
                </x-nav-link>

            </div>
        </div>
    </nav>
    {{ $slot }}
</body>

</html>