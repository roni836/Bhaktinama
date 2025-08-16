@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - MyPoojaPandit</title>
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

    <!-- Header Section -->
    <header class="bg-white shadow-sm">
        
    </header>

    <!-- Blog Hero Section -->
    <section class="relative bg-cover bg-center h-[400px] flex items-center justify-center rounded-b-lg overflow-hidden" style="background-image: url('{{ asset('images/BLOG PUJA PATA.jpg') }}')">
        <div class="absolute inset-0 bg-black opacity-50 rounded-b-lg"></div>
        <div class="relative z-10 text-white text-center px-4 max-w-4xl">
            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4 rounded-lg">
                Blog
            </h1>
            <p class="text-lg md:text-xl rounded-lg">
                Discover insights on Vedic rituals, astrology, festival significance, and spiritual wellness.
            </p>
        </div>
    </section>

    <!-- Blog Content Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 flex flex-col lg:flex-row gap-8">
            
            <!-- Main Blog Posts Area -->
            <div class="lg:w-3/4">
                <h2 class="text-3xl font-bold mb-8 text-gradient">Latest Blog Posts</h2>
                <div class="grid grid-cols-1 gap-8">
                    @foreach($blog as $item)
                    <!-- Blog Post 1 -->
        
                    <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col md:flex-row transform transition duration-300 hover:scale-105">
                        <img src="{{ asset('https://placehold.co/400x300/FFDDC1/FF7B00?text=Blog+Post+1') }}" alt="Top 10 Famous Hindu Saints" class="w-full md:w-1/3 h-48 md:h-auto object-cover rounded-t-lg md:rounded-l-lg md:rounded-tr-none">
                        <div class="p-6 flex-1 text-left">
                            <div class="flex items-center text-gray-500 text-sm mb-2">
                                <i class="far fa-calendar-alt mr-2"></i><span>{{$item->date}}</span>
                                <span class="mx-2">•</span>
                                <i class="fas fa-tag mr-2"></i><span>{{$item->category}}</span>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">{{$item->title}}</h3>
                            <p class="text-gray-700 mb-4">{{$item->meta_title}}</p>
                            <a href="#" class="text-orange-500 hover:underline font-medium">Read More</a>
                        </div>
                        
                    </div>
                    
                    <!-- Blog Post 2 -->
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

            <!-- Sidebar -->
            <div class="lg:w-1/4 bg-gray-50 rounded-lg p-6 shadow-md">
                <div class="mb-8">
                    <h3 class="text-xl font-semibold mb-4 text-gradient">Search Blog</h3>
                    <div class="relative">
                        <input type="text" placeholder="Search..." class="w-full pl-10 pr-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-4 text-gradient">Categories</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-4 py-2 bg-orange-200 text-orange-800 rounded-full text-sm font-medium hover:bg-orange-300 transition duration-300 cursor-pointer">Spirituality</span>
                        <span class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm font-medium hover:bg-gray-300 transition duration-300 cursor-pointer">Festival Fast</span>
                        <span class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm font-medium hover:bg-gray-300 transition duration-300 cursor-pointer">Temple Mandir</span>
                        <span class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm font-medium hover:bg-gray-300 transition duration-300 cursor-pointer">Puja Vidhi</span>
                        <span class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm font-medium hover:bg-gray-300 transition duration-300 cursor-pointer">Uncategorized</span>
                        <span class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm font-medium hover:bg-gray-300 transition duration-300 cursor-pointer">Aarti Chalisa</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

   

</body>
</html>
@endsection
