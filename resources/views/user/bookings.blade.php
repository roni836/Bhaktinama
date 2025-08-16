@extends('layouts.app')

@section('title', 'My Bookings')

@section('content')
<div class="bg-gradient-to-r from-orange-500 to-yellow-500 text-white">
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-6">
            <div class="w-24 h-24 md:w-32 md:h-32 rounded-full overflow-hidden border-4 border-white">
                <img src="{{ Auth::user()->profile_image ?? 'https://via.placeholder.com/150' }}" alt="Profile" class="w-full h-full object-cover">
            </div>
            <div class="text-center md:text-left">
                <h1 class="text-2xl md:text-3xl font-bold">{{ Auth::user()->name }}</h1>
                <div class="flex flex-col md:flex-row md:items-center space-y-2 md:space-y-0 md:space-x-6 mt-2 text-sm md:text-base">
                    <div class="flex items-center justify-center md:justify-start">
                        <i class="fas fa-envelope mr-2"></i>
                        <span>{{ Auth::user()->email }}</span>
                    </div>
                    @if(Auth::user()->phone)
                    <div class="flex items-center justify-center md:justify-start">
                        <i class="fas fa-phone-alt mr-2"></i>
                        <span>{{ Auth::user()->phone }}</span>
                    </div>
                    @endif
                    @if(Auth::user()->address)
                    <div class="flex items-center justify-center md:justify-start">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        <span>{{ Auth::user()->address }}</span>
                    </div>
                    @endif
                </div>
            </div>
            <div class="md:ml-auto flex space-x-3">
                <a href="{{ route('user.profile.edit') }}" class="bg-white text-orange-500 px-4 py-2 rounded-full font-medium hover:bg-gray-100 transition duration-300">
                    Edit Profile
                </a>
                <a href="#" class="bg-white text-orange-500 px-4 py-2 rounded-full font-medium hover:bg-gray-100 transition duration-300">
                    Change Password
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container mx-auto px-4 py-8">
    <div class="flex border-b border-gray-200">
        <a href="{{ route('user.bookings') }}" class="px-4 py-2 font-medium {{ request()->routeIs('user.bookings') ? 'text-orange-500 border-b-2 border-orange-500' : 'text-gray-600 hover:text-orange-500' }}">
            My Bookings
        </a>
        <a href="{{ route('user.orders') }}" class="px-4 py-2 font-medium {{ request()->routeIs('user.orders') ? 'text-orange-500 border-b-2 border-orange-500' : 'text-gray-600 hover:text-orange-500' }}">
            My Orders
        </a>
    </div>

    <div class="mt-8">
        @if(count($bookings) > 0)
            @foreach($bookings as $booking)
            <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                <div class="flex flex-col md:flex-row">
                    <div class="md:w-1/4">
                        <img src="{{ asset('images/temple-placeholder.jpg') }}" alt="Temple" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-6 md:w-3/4">
                        <div class="flex flex-col md:flex-row md:justify-between md:items-start">
                            <div>
                                <h2 class="text-xl font-bold text-gray-800">{{ $booking->ceremony_name }}</h2>
                                <p class="text-gray-600">{{ $booking->location }}</p>
                                <div class="mt-2">
                                    <p class="text-gray-700">{{ $booking->ceremony_date->format('F j, Y') }}</p>
                                    <p class="text-gray-700">{{ $booking->ceremony_time }}</p>
                                </div>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">Booking ID: {{ $booking->booking_id }}</p>
                                </div>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-600">Special Requirements: {{ $booking->special_requirements ?? 'None' }}</p>
                                </div>
                            </div>
                            <div class="mt-4 md:mt-0">
                                <a href="#" class="px-4 py-2 bg-red-500 text-white rounded-full text-sm font-medium hover:bg-red-600 transition duration-300">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="bg-gray-50 p-8 rounded-lg text-center">
                <p class="text-gray-500 mb-4">You don't have any bookings yet.</p>
                <a href="{{ route('bookpandit') }}" class="px-6 py-2 bg-orange-500 text-white rounded-full font-medium hover:bg-orange-600 transition duration-300">Book a Pandit</a>
            </div>
        @endif
    </div>
</div>
@endsection