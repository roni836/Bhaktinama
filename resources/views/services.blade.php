@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services - MyPoojaPandit</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Custom gradient for buttons */
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

    <!-- Header Section (reused from previous page, assuming a common layout) -->
    <header class="bg-white shadow-sm">
        
    </header>

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

    <!-- All Online Service Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-12 text-gradient">All Online Service</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

        @foreach($services as $item)   
                <!-- Service Item 1: Annaprashan Sanskar Puja -->
                <a href="{{ route('aa') }}" class="block">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105">
                        <img src="{{ asset('uploads/' . $item->image) }}" alt="{{$item->title}}" class="w-full h-48 object-cover rounded-t-lg">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold">{{$item->title}}</h3>
                        </div>
                    </div>
                </a>
                
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex justify-center items-center space-x-2 mt-12">
                <button class="w-10 h-10 rounded-full bg-orange-500 text-white font-semibold flex items-center justify-center shadow-md">1</button>
                <button class="w-10 h-10 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300 font-semibold flex items-center justify-center transition duration-300">2</button>
                <button class="w-10 h-10 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300 font-semibold flex items-center justify-center transition duration-300">3</button>
                <button class="w-10 h-10 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300 font-semibold flex items-center justify-center transition duration-300">4</button>
                <button class="w-10 h-10 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300 font-semibold flex items-center justify-center transition duration-300">5</button>
                <button class="w-10 h-10 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300 font-semibold flex items-center justify-center transition duration-300">6</button>
                <button class="w-10 h-10 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300 font-semibold flex items-center justify-center transition duration-300">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </section>


</body>
</html>
@endsection
