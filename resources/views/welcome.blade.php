@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyPoojaPandit - Sacred Rituals</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
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
    </style>
</head>
<body class="bg-white text-gray-800">
    </header>

    <!-- Hero Section -->
    <section class="relative bg-cover bg-center h-[600px] flex items-center justify-center rounded-b-lg overflow-hidden" style="background-image: url('{{ asset('images/pandit vip look.jpg') }}');">
        <div class="absolute inset-0 bg-black opacity-50 rounded-b-lg"></div>
        <div class="relative z-10 text-white text-center px-4 max-w-4xl">
            <h1 class="text-5xl md:text-6xl font-extrabold leading-tight mb-6 rounded-lg">
                Find Experienced Pandits for Your Sacred Rituals
            </h1>
            <p class="text-lg md:text-xl mb-8 rounded-lg">
                Book verified and experienced pandits for all your religious ceremonies. Authentic rituals performed with devotion and tradition.
            </p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <button class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-8 rounded-full shadow-lg transition duration-300">
                    Book a pandit now
                </button>
                <button class="bg-transparent border-2 border-white hover:bg-white hover:text-orange-500 text-white font-semibold py-3 px-8 rounded-full shadow-lg transition duration-300">
                    View services
                </button>
            </div>
        </div>
    </section>

    <!-- Available Online Service Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-12 text-gradient">Available Online Service</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Service Card 1 -->
                <a href="{{route('bookpandit')}} " class="group transform transition-transform duration-500 hover:translate-x-4">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="relative">
                            <img src="{{ asset('https://placehold.co/400x300/FEEBC8/FF7B00?text=Pandit') }}" alt="Pandit" class="w-full h-48 object-cover rounded-t-lg">
                            <div class="absolute inset-0 bg-orange-500 opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2 group-hover:text-orange-500">Book Pandit</h3>
                            <p class="text-gray-600">Book experienced pandits for your rituals</p>
                            <div class="mt-4 text-orange-500 group-hover:translate-x-2 transition-transform duration-300">
                                Learn More <i class="fas fa-arrow-right ml-2"></i>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Service Card 2 -->
                <a href="{{route('astrology')}}" class="group transform transition-transform duration-500 hover:-translate-x-4">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="relative">
                            <img src="{{ asset('https://placehold.co/400x300/FEEBC8/FF7B00?text=Astrology') }}" alt="Astrology" class="w-full h-48 object-cover rounded-t-lg">
                            <div class="absolute inset-0 bg-orange-500 opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2 group-hover:text-orange-500">Astrology Services</h3>
                            <p class="text-gray-600">Expert astrological consultations</p>
                            <div class="mt-4 text-orange-500 group-hover:translate-x-2 transition-transform duration-300">
                                Learn More <i class="fas fa-arrow-right ml-2"></i>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Service Card 3 -->
                <a href="{{route('temple')}}" class="group">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105">
                        <div class="relative">
                            <img src="{{ asset('https://placehold.co/400x300/FEEBC8/FF7B00?text=Temple') }}" alt="Temple" class="w-full h-48 object-cover rounded-t-lg">
                            <div class="absolute inset-0 bg-orange-500 opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2 group-hover:text-orange-500">Temple Service</h3>
                            <p class="text-gray-600">Sacred temple ceremonies and rituals</p>
                            <div class="mt-4 text-orange-500 group-hover:translate-x-2 transition-transform duration-300">
                                Learn More <i class="fas fa-arrow-right ml-2"></i>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Service Card 4 -->
                <a href="{{route('kundalini')}}" class="group">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105">
                        <div class="relative">
                            <img src="{{ asset('https://placehold.co/400x300/FEEBC8/FF7B00?text=Kundalini') }}" alt="Kundalini" class="w-full h-48 object-cover rounded-t-lg">
                            <div class="absolute inset-0 bg-orange-500 opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2 group-hover:text-orange-500">Kundalini</h3>
                            <p class="text-gray-600">Spiritual awakening and guidance</p>
                            <div class="mt-4 text-orange-500 group-hover:translate-x-2 transition-transform duration-300">
                                Learn More <i class="fas fa-arrow-right ml-2"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Trending Services Section -->
    <section class="py-16 bg-orange-50">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-12 text-gradient">Trending Services</h2>
            <div class="overflow-hidden">
                <div class="flex animate-infinite-scroll">
                    <!-- First set of cards -->
                    <div class="flex shrink-0">
                        <div class="w-72 mx-4 bg-white rounded-lg shadow-md overflow-hidden">
                            <img src="{{ asset('https://placehold.co/400x300/FFDDC1/FF7B00?text=Puja') }}" alt="Puja" class="w-full h-48 object-cover rounded-t-lg">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold">Vastu Shanti Puja</h3>
                            </div>
                        </div>
                        <div class="w-72 mx-4 bg-white rounded-lg shadow-md overflow-hidden">
                            <img src="{{ asset('https://placehold.co/400x300/FFDDC1/FF7B00?text=Temple') }}" alt="Temple" class="w-full h-48 object-cover rounded-t-lg">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold">Kaal Sarp Dosh Nivaran Puja</h3>
                            </div>
                        </div>
                        <div class="w-72 mx-4 bg-white rounded-lg shadow-md overflow-hidden">
                            <img src="{{ asset('https://placehold.co/400x300/FFDDC1/FF7B00?text=Bajrang') }}" alt="Bajrang Baan Path" class="w-full h-48 object-cover rounded-t-lg">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold">Bajrang Baan Path</h3>
                            </div>
                        </div>
                        <div class="w-72 mx-4 bg-white rounded-lg shadow-md overflow-hidden">
                            <img src="{{ asset('https://placehold.co/400x300/FFDDC1/FF7B00?text=Ritual') }}" alt="Ritual" class="w-full h-48 object-cover rounded-t-lg">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold">Satyanarayan Puja</h3>
                            </div>
                        </div>
                    </div>
                    <!-- Duplicate set for seamless loop -->
                    <div class="flex shrink-0">
                        <div class="w-72 mx-4 bg-white rounded-lg shadow-md overflow-hidden">
                            <img src="{{ asset('https://placehold.co/400x300/FFDDC1/FF7B00?text=Puja') }}" alt="Puja" class="w-full h-48 object-cover rounded-t-lg">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold">Vastu Shanti Puja</h3>
                            </div>
                        </div>
                        <div class="w-72 mx-4 bg-white rounded-lg shadow-md overflow-hidden">
                            <img src="{{ asset('https://placehold.co/400x300/FFDDC1/FF7B00?text=Temple') }}" alt="Temple" class="w-full h-48 object-cover rounded-t-lg">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold">Kaal Sarp Dosh Nivaran Puja</h3>
                            </div>
                        </div>
                        <div class="w-72 mx-4 bg-white rounded-lg shadow-md overflow-hidden">
                            <img src="{{ asset('https://placehold.co/400x300/FFDDC1/FF7B00?text=Bajrang') }}" alt="Bajrang Baan Path" class="w-full h-48 object-cover rounded-t-lg">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold">Bajrang Baan Path</h3>
                            </div>
                        </div>
                        <div class="w-72 mx-4 bg-white rounded-lg shadow-md overflow-hidden">
                            <img src="{{ asset('https://placehold.co/400x300/FFDDC1/FF7B00?text=Ritual') }}" alt="Ritual" class="w-full h-48 object-cover rounded-t-lg">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold">Satyanarayan Puja</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                @keyframes infinite-scroll {
                    from { transform: translateX(0); }
                    to { transform: translateX(-50%); }
                }
                .animate-infinite-scroll {
                    animation: infinite-scroll 20s linear infinite;
                }
            </style>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-12 text-gradient">Stats</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Stat Card 1 -->
                <div class="bg-orange-50 rounded-lg p-8 shadow-md flex flex-col items-center justify-center transform transition duration-300 hover:scale-105">
                    <div class="bg-orange-200 p-4 rounded-full mb-4">
                        <i class="fas fa-shopping-basket text-orange-600 text-3xl"></i>
                    </div>
                    <h3 class="text-4xl font-bold text-orange-700 mb-2">30+ Services</h3>
                    <p class="text-gray-600 text-center">Explore 30+ Vedic Puja Services performed by experienced Pandits, tailored for all your spiritual needs.</p>
                </div>
                <!-- Stat Card 2 -->
                <div class="bg-orange-50 rounded-lg p-8 shadow-md flex flex-col items-center justify-center transform transition duration-300 hover:scale-105">
                    <div class="bg-orange-200 p-4 rounded-full mb-4">
                        <i class="fas fa-book text-orange-600 text-3xl"></i>
                    </div>
                    <h3 class="text-4xl font-bold text-orange-700 mb-2">20651+ Bookings</h3>
                    <p class="text-gray-600 text-center">Trusted by 20,000+ families with over 20,651 successful puja bookings across India.</p>
                </div>
                <!-- Stat Card 3 -->
                <div class="bg-orange-50 rounded-lg p-8 shadow-md flex flex-col items-center justify-center transform transition duration-300 hover:scale-105">
                    <div class="bg-orange-200 p-4 rounded-full mb-4">
                        <i class="fas fa-smile text-orange-600 text-3xl"></i>
                    </div>
                    <h3 class="text-4xl font-bold text-orange-700 mb-2">30000+ Customers</h3>
                    <p class="text-gray-600 text-center">Serving 30,000+ happy customers with authentic and hassle-free puja experiences.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 bg-orange-50">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-12 text-gradient">Testimonials</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Testimonial Card 1 -->
                <div class="bg-white rounded-lg p-6 shadow-md flex flex-col items-center text-center transform transition duration-300 hover:scale-105">
                    <img src="{{ asset('https://placehold.co/80x80/FFDDC1/FF7B00?text=User1') }}" alt="Harshit Agarwal" class="w-20 h-20 rounded-full object-cover mb-4">
                    <p class="text-gray-700 mb-4">"Booking a pandit through MyPujaPandit was incredibly easy, and the entire Griha Pravesh ceremony was performed flawlessly."</p>
                    <p class="font-semibold text-gray-800">Harshit Agarwal, Lucknow</p>
                    <div class="flex text-yellow-500 mt-2">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                </div>
                <!-- Testimonial Card 2 -->
                <div class="bg-white rounded-lg p-6 shadow-md flex flex-col items-center text-center transform transition duration-300 hover:scale-105">
                    <img src="{{ asset('https://placehold.co/80x80/FFDDC1/FF7B00?text=User2') }}" alt="Ramesh Jha" class="w-20 h-20 rounded-full object-cover mb-4">
                    <p class="text-gray-700 mb-4">"MyPujaPandit offers hassle-free pandit booking services in India for performing different pujas."</p>
                    <p class="font-semibold text-gray-800">Ramesh Jha, Patna</p>
                    <div class="flex text-yellow-500 mt-2">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
                <!-- Testimonial Card 3 -->
                <div class="bg-white rounded-lg p-6 shadow-md flex flex-col items-center text-center transform transition duration-300 hover:scale-105">
                    <img src="{{ asset('https://placehold.co/80x80/FFDDC1/FF7B00?text=User3') }}" alt="Ankit Sharma" class="w-20 h-20 rounded-full object-cover mb-4">
                    <p class="text-gray-700 mb-4">"The Ganesh Puja worked wonders! I got the job call I had been waiting for. Blessed to have chosen this service."</p>
                    <p class="font-semibold text-gray-800">Ankit Sharma, Delhi</p>
                    <div class="flex text-yellow-500 mt-2">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                </div>
                <!-- Testimonial Card 4 -->
                <div class="bg-white rounded-lg p-6 shadow-md flex flex-col items-center text-center transform transition duration-300 hover:scale-105">
                    <img src="{{ asset('https://placehold.co/80x80/FFDDC1/FF7B00?text=User4') }}" alt="Lalita Patil" class="w-20 h-20 rounded-full object-cover mb-4">
                    <p class="text-gray-700 mb-4">"After the Shani Yogya, I finally had peaceful sleep—no more stress or uneasiness. Thank you for the divine support."</p>
                    <p class="font-semibold text-gray-800">Lalita Patil, Pune</p>
                    <div class="flex text-yellow-500 mt-2">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest from Blog Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-12 text-gradient">Latest from Blog</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Blog Post 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105">
                    <img src="{{ asset('https://placehold.co/600x400/FEEBC8/FF7B00?text=Blog1') }}" alt="Blog Post 1" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-6 text-left">
                        <div class="flex items-center text-gray-500 text-sm mb-2">
                            <i class="far fa-calendar-alt mr-2"></i><span>May 14, 2025</span>
                            <span class="mx-2">•</span>
                            <i class="fas fa-tag mr-2"></i><span>Spirituality</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Top 10 Famous Hindu Saints Who Are Still Inspiring India Today</h3>
                        <a href="#" class="text-orange-500 hover:underline font-medium">Read More</a>
                    </div>
                </div>
                <!-- Blog Post 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105">
                    <img src="{{ asset('https://placehold.co/600x400/FEEBC8/FF7B00?text=Blog2') }}" alt="Blog Post 2" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-6 text-left">
                        <div class="flex items-center text-gray-500 text-sm mb-2">
                            <i class="far fa-calendar-alt mr-2"></i><span>June 3, 2025</span>
                            <span class="mx-2">•</span>
                            <i class="fas fa-tag mr-2"></i><span>Festival Fast</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Indian Wedding Pre-Wedding Rituals Explained: Mehndi, Haldi, Sangeet, and...</h3>
                        <a href="#" class="text-orange-500 hover:underline font-medium">Read More</a>
                    </div>
                </div>
                <!-- Blog Post 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105">
                    <img src="{{ asset('https://placehold.co/600x400/FEEBC8/FF7B00?text=Blog3') }}" alt="Blog Post 3" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-6 text-left">
                        <div class="flex items-center text-gray-500 text-sm mb-2">
                            <i class="far fa-calendar-alt mr-2"></i><span>May 30, 2025</span>
                            <span class="mx-2">•</span>
                            <i class="fas fa-tag mr-2"></i><span>Temple Mandir</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Mathura & Vrindavan: Top Tourist Places, Temples, and the Divine Significance ...</h3>
                        <a href="#" class="text-orange-500 hover:underline font-medium">Read More</a>
                    </div>
                </div>
            </div>
            <button class="mt-12 bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-8 rounded-full shadow-lg transition duration-300">
                View All Blogs
            </button>
        </div>
    </section>

    <!-- Join as a Partner Section -->
    <section class="py-16 bg-orange-50">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="md:w-1/2 text-center md:text-left">
                <h2 class="text-3xl font-bold mb-6 text-gradient">Join as a Partner</h2>
                <p class="text-gray-700 text-lg mb-6">
                    Are you a qualified Pandit or spiritual service provider? Partner with us to reach thousands of devotees looking for authentic Vedic rituals and astrology services. Fill in your details and become a part of our trusted network.
                </p>
                <button class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-8 rounded-full shadow-lg transition duration-300">
                    Join as Partner
                </button>
            </div>
            <div class="md:w-1/2">
                <img src="{{ asset('https://placehold.co/600x400/FEEBC8/FF7B00?text=Temple') }}" alt="Temple" class="w-full h-auto rounded-lg shadow-lg">
            </div>
        </div>
    </section>

   
</body>
</html>
@endsection
