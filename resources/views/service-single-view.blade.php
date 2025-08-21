@extends('layouts.app')

@section('title', 'page Title')

@section('content')
<!-- Back Button -->
<a href="{{ url()->previous() }}" class="flex items-center px-14 py-2 text-orange-500 bg-[#FBC48D] hover:text-orange-600 mb-4">
    <i class="fas fa-arrow-left mr-2"></i> Go Back
</a>

<div class="container mx-auto px-4 py-6">


    <!-- Main Card -->
    <div class="bg-white rounded overflow-hidden">
        <!-- Image -->
        <div class="flex w-full">
            <img src="https://via.placeholder.com/1200x500" alt="Ambika Niketan Temple" class="w-full h-80 object-cover">


            <!-- Content -->
            <div class="p-6 w-10/12 ">
                <!-- Title & Description -->
                <h1 class="text-3xl font-bold text-gray-800 mb-2">{{$service->title}}</h1>
                <p class="text-gray-700 mb-4">
                    {{$service->description}}
                </p>
                <div class="flex flex-col  gap-2 mb-6">
                    <p class="text-orange-500 font-semibold"><span class="text-2xl">2,000+</span> devotees have booked</p>

                    <p class="text-gray-600 mt-2 md:mt-0"><span class="font-semibold text-gray-700">Location:</span>{{$service->location}}</p>
                </div>

                <!-- Button -->
                <a href="#" class="bg-[#1F2B50] w-full flex justify-center text-white px-6 py-3 rounded-full hover:bg-gray-900">View Package</a>
            </div>

        </div>
    </div>

    <!-- Sections -->
    <div class="mt-10 space-y-8">
        <!-- Overview -->
        <div>
            <h2 class="text-xl font-semibold text-orange-500 mb-3">Overview</h2>
            <ul class="list-disc pl-6 text-gray-700 space-y-2">
                <li>{{$service->overview}}</li>
                
            </ul>
        </div>

        <!-- Architecture & Temple Complex -->
        <div>
            <h2 class="text-xl font-semibold text-orange-500 mb-3">Architecture & Temple Complex</h2>
            <p class="text-gray-700">
                {{$service->architecture}}
            </p>
        </div>

        <!-- Visiting Information -->
        <div>
            <h2 class="text-xl font-semibold text-orange-500 mb-3">Visiting Information</h2>
            <ul class="list-disc pl-6 text-gray-700 space-y-2">
                <li><strong>Timing:</strong>{{$service->duration}}</li>
                <li><strong>Best Time to Visit:</strong> Navratri (Chaitra & Ashwin months)</li>
            </ul>
        </div>

        <!-- Facilities & Amenities -->
        <div>
            <h2 class="text-xl font-semibold text-orange-500 mb-3">Facilities & Amenities</h2>
            <ul class="list-disc pl-6 text-gray-700 space-y-2">{{$service->facilities}}
                <li>Parking: On-site for two-wheelers & four-wheeler</li>
                <li>Accessibility: Wheelchair accessible parking and entrance</li>
            </ul>
        </div>
    </div>
</div>
@endsection