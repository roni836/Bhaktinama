<header class="bg-white shadow-sm">
    <nav class="container mx-auto px-4 py-4 flex items-center justify-between">
        <div class="flex items-center space-x-2">
            <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                <i class="fas fa-om text-gray-600"></i>
            </div>
            <span class="font-bold text-lg">Pandit</span>
        </div>
        <div class="hidden md:flex items-center space-x-8">
            <a href="{{route('homepage')}}" class="text-gray-600 hover:text-orange-500 font-medium">Home</a>
            <a href="{{route('services')}}" class="text-gray-600 hover:text-orange-500 font-medium">Service</a>
            <a href="{{route('shop')}}" class="text-gray-600 hover:text-orange-500 font-medium">Shop</a>
            <a href="{{route('about')}}" class="text-gray-600 hover:text-orange-500 font-medium">About Us</a>
            <a href="{{route('blog')}}" class="text-gray-600 hover:text-orange-500 font-medium">Blog</a>
            <a href="{{route('contact')}}" class="text-gray-600 hover:text-orange-500 font-medium">Contact Us</a>
        </div>
        <div class="flex items-center space-x-4">
            <div class="hidden md:flex items-center space-x-2 text-gray-600">
                <i class="fas fa-map-marker-alt"></i>
                <span>Set Location</span>
            </div>
            <!-- search -->
            <div class="flex-1 px-4 flex justify-center lg:justify-end">
                <div class="w-full max-w-lg lg:max-w-xs relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </span>
                    <input class="block w-full pl-7 pr-2 py-3 border border-gray-300 rounded-full leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 sm:text-sm" placeholder="Search" type="search">
                </div>
            </div>
            
            @auth
                <!-- User is logged in -->
                <div class="relative" x-data="{ open: false }" @click.away="open = false">
                    <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                        <span class="text-gray-700 hover:text-orange-500">My Profile</span>
                        <i class="fas fa-chevron-down text-xs text-gray-500"></i>
                    </button>
                    
                    <!-- Dropdown menu -->
                    <div x-show="open" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50" style="display: none;">
                        <!-- <a href="{{ route('user.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-500">
                            <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                        </a> -->
                        <a href="{{ route('user.profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-500">
                            <i class="fas fa-user mr-2"></i> My Profile
                        </a>
                        <a href="{{ route('user.bookings') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-500">
                            <i class="fas fa-calendar-check mr-2"></i> My Bookings
                        </a>
                        <a href="{{ route('user.orders') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-500">
                            <i class="fas fa-shopping-bag mr-2"></i> My Orders
                        </a>
                        <div class="border-t border-gray-100 my-1"></div>
                        <form method="POST" action="{{ route('logout') }}" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-500">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <!-- User is not logged in -->
                <a href="{{ route('login') }}" class="px-4 py-2 rounded-full bg-white border border-orange-500 text-orange-500 font-semibold hover:bg-orange-500 hover:text-white transition duration-300">
                    Login
                </a>
                <a href="{{ route('register') }}" class="px-4 py-2 rounded-full bg-orange-500 text-white font-semibold hover:bg-orange-600 transition duration-300">
                    Sign Up
                </a>
            @endauth
        </div>
    </nav>
</header>

<!-- Include Alpine.js directly -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>