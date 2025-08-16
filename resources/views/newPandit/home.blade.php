<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pandit Bookings</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }
        .group:hover .group-hover\:block {
            display: block;
        }
    </style>
</head>
<body>
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


    <main class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-center text-orange-600 mb-8">Current Bookings</h1>

        <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 space-y-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="md:col-span-2 space-y-4">
                    <div>
                        <p class="text-xl font-bold text-gray-800">Arun Patel</p>
                        <p class="text-gray-600">July 15, 2025</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Contact</p>
                        <p class="text-gray-800 mt-1">+91 98765 43210</p>
                        <p class="text-gray-800">arun.patel@email.com</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Address</p>
                        <p class="text-gray-800 mt-1">42 Rajmahal Gardens, Near City Mall Bangalore, Karnataka 560001 Landmark: Opposite Grand Hotel</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Special Requests</p>
                        <p class="text-gray-800 mt-1">Need all traditional items for havan. Prefer early morning ceremony start.</p>
                    </div>
                </div>
                <div class="md:col-span-1">
                    <p class="font-semibold text-gray-800">09:00 AM – 12:00 PM</p>
                    <p class="text-gray-600">Griha Pravesh Ceremony</p>
                    <div class="mt-4">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Preferred Language</p>
                        <p class="text-gray-800 mt-1">Hindi, English</p>
                    </div>
                </div>
            </div>

            <hr>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="md:col-span-2 space-y-4">
                    <div>
                        <p class="text-xl font-bold text-gray-800">Priya Mehta</p>
                        <p class="text-gray-600">Baby Naming Ceremony</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Contact</p>
                        <p class="text-gray-800 mt-1">+91 87654 32109</p>
                        <p class="text-gray-800">priya.mehta@email.com</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Address</p>
                        <p class="text-gray-800 mt-1">15 Silver Springs, Lake View Road Mumbai, Maharashtra 400001 Landmark: Next to Central Park</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Special Requests</p>
                        <p class="text-gray-800 mt-1">Would like to include special prayers for baby's health and prosperity.</p>
                    </div>
                </div>
                <div class="md:col-span-1">
                    <p class="font-semibold text-gray-800">July 18, 2025</p>
                    <p class="text-gray-600">10:30 AM – 01:30 PM</p>
                    <div class="mt-4">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Preferred Language</p>
                        <p class="text-gray-800 mt-1">Gujarati, Hindi</p>
                    </div>
                </div>
            </div>

        </div>
    </main>
    
    <main class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-center text-orange-600 mb-8">Previous Bookings</h1>
        
        <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
            <div class="flex flex-col md:flex-row gap-4 justify-between items-center mb-6">
                <div class="relative w-full md:w-1/2 lg:w-1/3">
                    <input type="text" placeholder="Search by name or puja type" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                </div>
                <div class="flex items-center gap-3">
                    <button class="flex items-center gap-2 text-gray-700 bg-gray-100 border border-gray-200 rounded-lg px-4 py-2 hover:bg-gray-200 font-semibold">
                       <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L12 14.414l-7.707-7.707A1 1 0 013 6V4z" /></svg>
                        Filter
                    </button>
                    <button class="flex items-center gap-2 text-gray-700 bg-gray-100 border border-gray-200 rounded-lg px-4 py-2 hover:bg-gray-200 font-semibold">
                       <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        Date Range
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <div class="min-w-full">
                    <div class="grid grid-cols-6 gap-4 text-left text-sm font-bold text-gray-500 uppercase tracking-wider py-4 border-b">
                        <div class="col-span-1">Puja Details</div>
                        <div class="col-span-1">Customer</div>
                        <div class="col-span-1">Date & Time</div>
                        <div class="col-span-1 text-center">Status</div>
                        <div class="col-span-1 text-right">Payment</div>
                        <div class="col-span-1 text-center">Actions</div>
                    </div>
                    <div class="space-y-2">
                        <div class="grid grid-cols-6 gap-4 items-center text-sm text-gray-800 py-4 border-b">
                            <div class="col-span-1">
                                <p class="font-semibold">Satyanarayan Puja</p>
                                <p class="text-gray-500">Duration: 3 hours</p>
                            </div>
                            <div class="col-span-1">
                                <p class="font-semibold">Meera Sharma</p>
                                <p class="text-gray-500">+91 99887 65432</p>
                            </div>
                            <div class="col-span-1">June 30, 2025 <br> <span class="text-gray-500">09:00 AM</span></div>
                            <div class="col-span-1 flex justify-center"><span class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full">Completed</span></div>
                            <div class="col-span-1 text-right font-semibold">INR 2000</div>
                            <div class="col-span-1 text-center"><a href="#" class="font-bold text-orange-600 hover:underline">View Details</a></div>
                        </div>
                        <div class="grid grid-cols-6 gap-4 items-center text-sm text-gray-800 py-4 border-b">
                             <div class="col-span-1">
                                <p class="font-semibold">Grih Pravesh</p>
                                <p class="text-gray-500">Duration: 4 hours</p>
                            </div>
                            <div class="col-span-1">
                                <p class="font-semibold">Rajiv Malhotra</p>
                                <p class="text-gray-500">+91 98765 43210</p>
                            </div>
                            <div class="col-span-1">June 25, 2025 <br> <span class="text-gray-500">09:00 AM</span></div>
                            <div class="col-span-1 flex justify-center"><span class="bg-red-100 text-red-800 text-xs font-bold px-3 py-1 rounded-full">Cancelled</span></div>
                            <div class="col-span-1 text-right font-semibold">INR 2000</div>
                            <div class="col-span-1 text-center"><a href="#" class="font-bold text-orange-600 hover:underline">View Details</a></div>
                        </div>
                         </div>
                </div>
            </div>

            
            
            <div class="flex justify-between items-center mt-6 text-sm">
                <p class="text-gray-600">Showing 1 to 3 of 24 results</p>
                <div class="flex items-center gap-1">
                    <a href="#" class="px-3 py-1 border rounded-md hover:bg-gray-100">Previous</a>
                    <a href="#" class="px-3 py-1 rounded-md bg-orange-500 text-white">1</a>
                    <a href="#" class="px-3 py-1 rounded-md hover:bg-gray-100">2</a>
                    <a href="#" class="px-3 py-1 rounded-md hover:bg-gray-100">3</a>
                    <a href="#" class="px-3 py-1 border rounded-md hover:bg-gray-100">Next</a>
                </div>
            </div>
        </div>

        
    </main>
     <!-- Footer Section -->
    <footer class="bg-gray-900 text-gray-300 py-16">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Company</h3>
                <ul>
                    <li class="mb-2"><a href="#" class="hover:text-orange-500">About Us</a></li>
                    <li class="mb-2"><a href="#" class="hover:text-orange-500">Contact Us</a></li>
                    <li class="mb-2"><a href="#" class="hover:text-orange-500">Privacy Policy</a></li>
                    <li class="mb-2"><a href="#" class="hover:text-orange-500">Terms & Conditions</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Partnership</h3>
                <ul>
                    <li class="mb-2"><a href="#" class="hover:text-orange-500">Vendor Signup</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Other links</h3>
                <ul>
                    <li class="mb-2"><a href="#" class="hover:text-orange-500">MyPoojaPandit Blog</a></li>
                    <li class="mb-2"><a href="#" class="hover:text-orange-500">Feedback & Suggestions</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Contact Us</h3>
                <p class="mb-2">2nd Floor, Leeavart Central, Patliputra, Patna</p>
                <p class="mb-2"><i class="fas fa-phone-alt mr-2"></i>851871 81725</p>
                <p class="mb-4"><i class="fas fa-envelope mr-2"></i>care@mypujapandit.com</p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-orange-500 text-xl"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-gray-400 hover:text-orange-500 text-xl"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-400 hover:text-orange-500 text-xl"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="text-gray-400 hover:text-orange-500 text-xl"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
        <div class="text-center text-gray-500 text-sm mt-8">
            &copy; {{ date('Y') }} MyPoojaPandit. All rights reserved.
        </div>
    </footer>

    
</body>
</html>