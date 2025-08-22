@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6">

    <!-- Go Back -->
    <div class="mb-4 bg-[#FBC48D] p-2">
        <a href="{{ url()->previous() }}" class="flex w-full items-center text-orange-500 hover:text-orange-600">
            ← Go Back
        </a>
    </div>

    <!-- Title -->
    <div class="text-center mb-10">
        <h1 class="text-2xl md:text-3xl font-bold text-orange-600">Pandits List By Patna Location</h1>
        <h2 class="text-xl font-semibold text-gray-800 mt-6">Our Experienced Pandits</h2>
        <p class="text-gray-600 mt-2">Choose from our carefully selected pandits, each specializing in various religious ceremonies and rituals</p>
    </div>

    <!-- Pandit Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Card -->
        <div class="bg-white shadow  rounded p-5">
            <div class="flex items-center mb-4">
                <img src="https://placehold.co/60x60" class="w-14 h-14 rounded-full object-cover border" alt="">
                <div class="ml-3">
                    <h3 class="font-bold text-lg">Pandit Rajesh Sharma</h3>
                    <p class="text-gray-500 text-sm">Sanskrit Scholar, Vedic Expert</p>
                </div>
            </div>
            <ul class="text-gray-700 mb-4 space-y-2">
                <li class="flex items-center"><span class="text-blue-500">✔</span> <span class="ml-2">Satyanarayan Puja</span></li>
                <li class="flex items-center"><span class="text-blue-500">✔</span> <span class="ml-2">Griha Pravesh</span></li>
                <li class="flex items-center"><span class="text-blue-500">✔</span> <span class="ml-2">Marriage Ceremonies</span></li>
            </ul>
            <button class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 rounded-md">Select Pandit</button>
        </div>

        <!-- Repeat for others -->
        <div class="bg-white shadow rounded-lg p-5">
            <div class="flex items-center mb-4">
                <img src="https://placehold.co/60x60" class="w-14 h-14 rounded-full object-cover border" alt="">
                <div class="ml-3">
                    <h3 class="font-bold text-lg">Pandit Mukesh Joshi</h3>
                    <p class="text-gray-500 text-sm">Vastu Expert, Astrologer</p>
                </div>
            </div>
            <ul class="text-gray-700 mb-4 space-y-2">
                <li class="flex items-center"><span class="text-blue-500">✔</span> <span class="ml-2">Vastu Consultation</span></li>
                <li class="flex items-center"><span class="text-blue-500">✔</span> <span class="ml-2">Horoscope Reading</span></li>
                <li class="flex items-center"><span class="text-blue-500">✔</span> <span class="ml-2">Navagraha Shanti</span></li>
            </ul>
            <button class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 rounded-md">Select Pandit</button>
        </div>

        <!-- Another Card -->
        <div class="bg-white shadow rounded-lg p-5">
            <div class="flex items-center mb-4">
                <img src="https://placehold.co/60x60" class="w-14 h-14 rounded-full object-cover border" alt="">
                <div class="ml-3">
                    <h3 class="font-bold text-lg">Pandit Arun Kumar</h3>
                    <p class="text-gray-500 text-sm">Karmakand Expert</p>
                </div>
            </div>
            <ul class="text-gray-700 mb-4 space-y-2">
                <li class="flex items-center"><span class="text-blue-500">✔</span> <span class="ml-2">Ganesh Puja</span></li>
                <li class="flex items-center"><span class="text-blue-500">✔</span> <span class="ml-2">Mundan Ceremony</span></li>
                <li class="flex items-center"><span class="text-blue-500">✔</span> <span class="ml-2">Naming Ceremony</span></li>
            </ul>
            <button class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 rounded-md">Select Pandit</button>
        </div>

        <!-- Add remaining cards similarly -->

    </div>
</div>
@endsection
