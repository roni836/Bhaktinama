
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Pandit Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Simple CSS for dropdown hover */
        .group:hover .group-hover\:block {
            display: block;
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="w-full">

<header class="bg-white shadow-sm">
    <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo -->
        <div class="text-2xl font-bold text-gray-800">Pandit</div>

        <!-- Right Side -->
        <div class="flex items-center gap-4">

            <!-- Search Button -->
            <button class="hidden sm:flex items-center gap-2 text-gray-600 border rounded-lg px-4 py-2 hover:bg-gray-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                Search
            </button>

            <!-- Profile Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center gap-2 focus:outline-none">
                    <div class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <i class="fas fa-chevron-down text-xs text-gray-500"></i>
                </button>

                <!-- Dropdown Menu -->
                <div 
                    x-show="open" 
                    @click.away="open = false" 
                    x-transition 
                    class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50"
                    style="display: none;"
                >
                    <a href="/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-500">
                        <i class="fas fa-user mr-2"></i> My Profile
                    </a>
                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-500">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- Alpine.js CDN -->
<script src="https://unpkg.com/alpinejs" defer></script>


        <main class="container mx-auto px-4 lg:px-8 pb-12">
            <div class="relative mt-4 rounded-xl overflow-hidden">
                <div class="h-60 md:h-52 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1620607238773-a8f881966a34?q=80&w=2070&auto=format&fit=crop');">
                    <div class="h-full w-full bg-black bg-opacity-50"></div>
                </div>

                <div class="absolute inset-0 flex flex-col md:flex-row items-center justify-between p-6 text-white">
                    <div class="flex items-center gap-4">
                        <img src=" " alt="Rahul Sharma" class="h-24 w-24 md:h-28 md:w-28 rounded-full border-4 border-white shadow-lg">
                        <div>
                            <h1 class="text-2xl md:text-3xl font-bold">Rahul Sharma</h1>
                            <div class="mt-2 space-y-1 text-xs md:text-sm">
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    <span>rahul.sharma@example.com</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                    <span>+91 98765 43210</span>
                                </div>
                            </div>
                            <div class="mt-4 flex gap-3">
                                <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg text-sm">Edit Profile</button>
                                <button class="bg-transparent border border-white hover:bg-white hover:text-black text-white font-semibold py-2 px-4 rounded-lg text-sm">Change Password</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="self-start md:self-auto mt-4 md:mt-0">
                         <div class="flex items-center gap-3">
                            <span class="text-white font-semibold text-sm">Available</span>
                            <button class="w-12 h-6 flex items-center bg-gray-300 rounded-full p-1 cursor-pointer" onclick="this.classList.toggle('bg-orange-500')">
                                <div class="bg-white w-5 h-5 rounded-full shadow-md transform transition-transform duration-300 ease-in-out" style="transform: translateX(0px);"></div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 -mt-8 relative z-10">
                
                <section>
                    <h2 class="text-xl font-bold text-gray-800">Specializations</h2>
                    <div class="flex flex-wrap gap-3 mt-4">
                        <span class="bg-gray-100 text-gray-800 border border-gray-300 font-medium px-4 py-2 rounded-full text-sm cursor-pointer">Vastu Consultation</span>
                        <span class="bg-gray-100 text-gray-800 border border-gray-300 font-medium px-4 py-2 rounded-full text-sm cursor-pointer">Vedic Astrology</span>
                        <span class="bg-gray-100 text-gray-800 border border-gray-300 font-medium px-4 py-2 rounded-full text-sm cursor-pointer">Marriage Compatibility</span>
                        <span class="text-gray-600 border border-gray-300 font-medium px-4 py-2 rounded-full text-sm cursor-pointer">Spiritual Healing</span>
                    </div>
                </section>

                <hr class="my-8">

                <section>
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Bookings Calendar</h2>
                    <div class="mb-6">
                        <div class="grid grid-cols-7 gap-1 text-center text-sm text-gray-500 font-semibold mb-3">
                            <div>Mon</div><div>Tue</div><div>Wed</div><div>Thu</div><div>Fri</div><div>Sat</div><div>Sun</div>
                        </div>
                        <div class="grid grid-cols-7 gap-1 text-center text-gray-800">
                            <div class="flex justify-center items-center h-10 w-10 mx-auto font-medium">23</div>
                            <div class="flex justify-center items-center h-10 w-10 mx-auto bg-orange-500 text-white rounded-full font-bold">24</div>
                            <div class="flex justify-center items-center h-10 w-10 mx-auto bg-orange-500 text-white rounded-full font-bold">25</div>
                            <div class="flex justify-center items-center h-10 w-10 mx-auto rounded-full border-2 border-orange-500 text-orange-500 font-semibold">26</div>
                            <div class="flex justify-center items-center h-10 w-10 mx-auto font-medium">27</div>
                            <div class="flex justify-center items-center h-10 w-10 mx-auto font-medium text-gray-400">28</div>
                            <div class="flex justify-center items-center h-10 w-10 mx-auto font-medium text-gray-400">29</div>
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="border border-gray-200 rounded-xl p-5 md:p-6">
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-y-4 gap-x-6 text-sm">
                                <div>
                                    <p class="font-bold text-base text-gray-900">Arun Patel</p>
                                    <p class="text-gray-500 mt-1">July 24, 2025</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">09:00 AM - 12:00 PM</p>
                                    <p class="text-gray-500 mt-1">Griha Pravesh Ceremony</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">+91 98765 43210</p>
                                    <p class="text-gray-500 mt-1">arun.patel@email.com</p>
                                </div>
                                <div class="text-left md:text-right">
                                    <p class="font-semibold text-gray-800">Hindi, English</p>
                                </div>
                            </div>
                            <div class="mt-6">
                                <p class="text-xs font-bold text-orange-600 tracking-wide">ADDRESS</p>
                                <p class="text-gray-700 text-sm mt-1">42 Rajmahal Gardens, Near City Mall Bangalore, Karnataka 560001 Landmark: Opposite Grand Hotel</p>
                            </div>
                            <div class="mt-6 bg-orange-50 border border-orange-400 rounded-lg p-4">
                                <p class="text-xs font-bold text-orange-600 tracking-wide">SPECIAL REQUESTS</p>
                                <p class="text-gray-700 text-sm mt-1">Need all traditional items for havan. Prefer early morning ceremony start.</p>
                            </div>
                        </div>

                         <div class="border border-gray-200 rounded-xl p-5 md:p-6">
                             <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-y-4 gap-x-6 text-sm">
                                <div>
                                    <p class="font-bold text-base text-gray-900">Priya Singh</p>
                                    <p class="text-gray-500 mt-1">July 25, 2025</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">02:00 PM - 03:00 PM</p>
                                    <p class="text-gray-500 mt-1">Marriage Compatibility</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">+91 91234 56789</p>
                                    <p class="text-gray-500 mt-1">priya.singh@email.com</p>
                                </div>
                                <div class="text-left md:text-right">
                                    <p class="font-semibold text-gray-800">English</p>
                                </div>
                            </div>
                             <div class="mt-6">
                                <p class="text-xs font-bold text-orange-600 tracking-wide">ADDRESS</p>
                                <p class="text-gray-700 text-sm mt-1">101 Coral Heights, Juhu, Mumbai, Maharashtra 400049 Landmark: Near Prithvi Theatre</p>
                            </div>
                            <div class="mt-6 bg-orange-50 border border-orange-400 rounded-lg p-4">
                                <p class="text-xs font-bold text-orange-600 tracking-wide">SPECIAL REQUESTS</p>
                                <p class="text-gray-700 text-sm mt-1">Online consultation requested. Please send video call link 15 minutes prior.</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            
        </main>
    </div>

<script>
    // Simple script for the availability toggle visual
    document.querySelector('.cursor-pointer').addEventListener('click', function() {
        const circle = this.querySelector('.transform');
        if (this.classList.contains('bg-orange-500')) {
            circle.style.transform = 'translateX(0px)';
        } else {
            circle.style.transform = 'translateX(24px)';
        }
    });
</script>
</body>
</html>