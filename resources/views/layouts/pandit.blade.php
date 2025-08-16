<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Pandit Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    @yield('styles')
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="bg-gray-900 text-white w-64 flex-shrink-0 hidden md:block">
            <div class="p-4 flex items-center border-b border-gray-800">
                <span class="text-xl font-bold">MyPoojaPandit</span>
            </div>
            <nav class="mt-6">
                <a href="{{ route('pandit.dashboard') }}" class="flex items-center py-3 px-4 text-gray-300 hover:bg-gray-800 hover:text-white {{ request()->routeIs('pandit.dashboard') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="{{ route('pandit.bookings') }}" class="flex items-center py-3 px-4 text-gray-300 hover:bg-gray-800 hover:text-white {{ request()->routeIs('pandit.bookings') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fas fa-calendar-alt mr-3"></i>
                    Bookings
                </a>
                <a href="{{ route('pandit.profile') }}" class="flex items-center py-3 px-4 text-gray-300 hover:bg-gray-800 hover:text-white {{ request()->routeIs('pandit.profile') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fas fa-user mr-3"></i>
                    Profile
                </a>
                <form method="POST" action="{{ route('pandit.logout') }}" class="mt-10">
                    @csrf
                    <button type="submit" class="flex items-center py-3 px-4 text-gray-300 hover:bg-gray-800 hover:text-white w-full text-left">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        Logout
                    </button>
                </form>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                        <button class="text-gray-500 focus:outline-none md:hidden">
                            <i class="fas fa-bars"></i>
                        </button>
                        <h1 class="text-xl font-semibold text-gray-900 ml-4">@yield('header', 'Dashboard')</h1>
                    </div>
                    <div class="flex items-center">
                        <div class="relative">
                            <span class="text-gray-700">{{ Auth::guard('pandit')->user()->name }}</span>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                        <p>{{ session('error') }}</p>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    @yield('scripts')
</body>
</html>