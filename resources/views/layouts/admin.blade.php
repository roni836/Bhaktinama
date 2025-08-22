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


        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm z-10">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">

                    <!-- Left Logo -->
                    <div class="flex items-center">
                        <img src="/your-logo.png" alt="Logo" class="h-8 w-8">
                        <span class="ml-2 text-[#FF6B00] font-semibold"> bhaktinama </span>
                    </div>
                    <!-- Center Navigation -->
                    <nav class="hidden md:flex space-x-6 text-gray-700 font-medium">
                        <a href="{{ route('admin.dashboard') }}"
                            class="{{ request()->routeIs('admin.dashboard') ? 'text-[#FF6B00] font-semibold' : 'hover:text-[#FF6B00]' }}">
                            Home
                        </a>

                        <a href="{{ route('admin.services') }}"
                            class="{{ request()->routeIs('admin.services.*') ? 'text-[#FF6B00] font-semibold' : 'hover:text-[#FF6B00]' }}">
                            Services
                        </a>

                        <a href="{{ route('admin.pandits') }}"
                            class="{{ request()->routeIs('admin.pandits.*') ? 'text-[#FF6B00] font-semibold' : 'hover:text-[#FF6B00]' }}">
                            Pandits
                        </a>

                        <a href="{{ route('admin.temples') }}"
                            class="{{ request()->routeIs('admin.temples.*') ? 'text-[#FF6B00] font-semibold' : 'hover:text-[#FF6B00]' }}">
                            Temples
                        </a>

                        <a href="{{ route('admin.products') }}"
                            class="{{ request()->routeIs('admin.products.*') ? 'text-[#FF6B00] font-semibold' : 'hover:text-[#FF6B00]' }}">
                            Products
                        </a>

                        <a href="{{ route('admin.orders') }}"
                            class="{{ request()->routeIs('admin.orders.*') ? 'text-[#FF6B00] font-semibold' : 'hover:text-[#FF6B00]' }}">
                            Orders
                        </a>

                        <a href="{{ route('admin.blogs') }}"
                            class="{{ request()->routeIs('admin.blogs.*') ? 'text-[#FF6B00] font-semibold' : 'hover:text-[#FF6B00]' }}">
                            Blogs
                        </a>

                        <a href="{{ url('/admin/contacts') }}"
                            class="{{ request()->is('admin/contacts') ? 'text-[#FF6B00] font-semibold' : 'hover:text-[#FF6B00]' }}">
                            Contacts 
                        </a>
                    </nav>


                    <!-- Right Side -->
                    <div class="flex items-center space-x-4">
                        <!-- Search Button -->
                        <button class="flex items-center border border-[#FF6B00]  px-4 py-1 rounded-full hover:bg-orange-50">
                            <i class="fas fa-search mr-2 text-[#FF6B00]"></i> Search
                        </button>

                        <!-- Right Logo -->
                        <img src="/your-logo.png" alt="Logo" class="h-8 w-8">
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