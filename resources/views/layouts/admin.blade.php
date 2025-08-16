<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - MyPoojaPandit Admin</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .btn-gradient {
            background: linear-gradient(to right, #FF7B00, #FF9F00);
        }
        .text-gradient {
            background: linear-gradient(to right, #FF7B00, #FF9F00);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .sidebar-link {
            @apply flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors;
        }
        .sidebar-link.active {
            @apply bg-orange-100 text-orange-500;
        }
        .sidebar-link:hover {
            @apply bg-orange-50 text-orange-500;
        }
    </style>
    @yield('styles')
</head>
<body class="bg-gray-50 text-gray-800">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 border-r border-gray-200 bg-white">
            <!-- Sidebar Header -->
            <div class="flex items-center justify-center h-16 px-4 border-b border-gray-200">
                <div class="flex items-center space-x-2">
                <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                    <i class="fas fa-om text-gray-600"></i>
                </div>
                <span class="font-bold text-lg">MyPoojaPandit</span>
                </div>
            </div>
            
            <!-- Sidebar Content -->
            <div class="flex-1 overflow-y-auto py-4">
                <nav class="flex flex-col space-y-2 px-4">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home w-5"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.users') }}" class="sidebar-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                    <i class="fas fa-users w-5"></i>
                    <span>Users</span>
                </a>
                <a href="{{ route('admin.services') }}" class="sidebar-link {{ request()->routeIs('admin.services*') ? 'active' : '' }}">
                    <i class="fas fa-concierge-bell"></i>
                    <span>Services</span>
                </a>
                <a href="{{ route('admin.pandits') }}" class="sidebar-link {{ request()->routeIs('admin.pandits*') ? 'active' : '' }}">
                    <i class="fas fa-user-tie w-5"></i>
                    <span>Pandits</span>
                </a>
                <a href="{{ route('admin.temples') }}" class="sidebar-link {{ request()->routeIs('admin.temples*') ? 'active' : '' }}">
                    <i class="fas fa-place-of-worship w-5"></i>
                    <span>Temples</span>
                </a>
                <a href="{{ route('admin.bookings') }}" class="sidebar-link {{ request()->routeIs('admin.bookings*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-check w-5"></i>
                    <span>Bookings</span>
                </a>
                <a href="{{ route('admin.products') }}" class="sidebar-link {{ request()->routeIs('admin.products*') ? 'active' : '' }}">
                    <i class="fas fa-box w-5"></i>
                    <span>Products</span>
                </a>
                <a href="{{ route('admin.orders') }}" class="sidebar-link {{ request()->routeIs('admin.orders*') ? 'active' : '' }}">
                    <i class="fas fa-shopping-cart w-5"></i>
                    <span>Orders</span>
                </a>
               
                <a href="{{ route('admin.blogs') }}" class="sidebar-link {{ request()->routeIs('admin.blogs*') ? 'active' : '' }}">
                    <i class="fas fa-blog"></i>
                    <span>Blogs</span>
                </a>
                </nav>
            </div>
            
            <!-- Sidebar Footer -->
            <div class="p-4 border-t border-gray-200">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="sidebar-link text-gray-700 w-full text-left">
                        <i class="fas fa-sign-out-alt w-5"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm z-10">
                <div class="px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
                    <!-- Mobile menu button -->
                    <button type="button" class="md:hidden text-gray-500 hover:text-gray-600 focus:outline-none">
                        <i class="fas fa-bars"></i>
                    </button>
                    
                    <!-- Search -->
                    <div class="flex-1 px-4 flex justify-center lg:justify-end">
                        <div class="w-full max-w-lg lg:max-w-xs relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </span>
                            <input class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-full leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 sm:text-sm" placeholder="Search" type="search">
                        </div>
                    </div>
                    
                    <!-- Right side elements -->
                    <div class="flex items-center space-x-4">
                        <button class="text-gray-500 hover:text-gray-600">
                            <i class="fas fa-bell"></i>
                        </button>
                        <div class="relative">
                            <button class="flex items-center space-x-2 text-sm focus:outline-none">
                                <img class="h-8 w-8 rounded-full object-cover" src="https://placehold.co/80x80/FFDDC1/FF7B00?text=Admin" alt="Admin">
                                <span class="hidden md:block font-medium text-gray-700">{{ Auth::guard('admin')->user()->name ?? 'Admin User' }}</span>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto bg-gray-50 p-4 sm:p-6 lg:p-8">
                @if(session('success'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif
                
                @yield('content')
            </main>
        </div>
    </div>

    @yield('scripts')
</body>
</html>