@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold mb-6">Welcome, {{ Auth::user()->name }}</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-orange-50 p-6 rounded-lg">
                <h2 class="text-lg font-semibold mb-4">My Bookings</h2>
                <p class="text-gray-600">View and manage your puja bookings</p>
                <a href="#" class="mt-4 inline-block text-orange-500 hover:underline">View Bookings</a>
            </div>
            
            <div class="bg-orange-50 p-6 rounded-lg">
                <h2 class="text-lg font-semibold mb-4">My Profile</h2>
                <p class="text-gray-600">Update your personal information</p>
                <a href="#" class="mt-4 inline-block text-orange-500 hover:underline">Edit Profile</a>
            </div>
            
            <div class="bg-orange-50 p-6 rounded-lg">
                <h2 class="text-lg font-semibold mb-4">Book a Pandit</h2>
                <p class="text-gray-600">Schedule a new puja with a pandit</p>
                <a href="{{ route('bookpandit') }}" class="mt-4 inline-block text-orange-500 hover:underline">Book Now</a>
            </div>
        </div>
        
        <div class="mt-8">
            <h2 class="text-xl font-semibold mb-4">Recent Bookings</h2>
            <div class="bg-gray-50 p-4 rounded-lg text-center">
                <p class="text-gray-500">You don't have any recent bookings.</p>
                <a href="{{ route('bookpandit') }}" class="mt-2 inline-block text-orange-500 hover:underline">Book a Pandit</a>
            </div>
        </div>
    </div>
</div>
@endsection