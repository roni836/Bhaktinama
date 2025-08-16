@extends('layouts.pandit')

@section('title', 'Dashboard')

@section('header', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <!-- Stats Card 1 -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-orange-100 text-orange-500">
                    <i class="fas fa-calendar-check text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-gray-500 text-sm">Upcoming Bookings</p>
                    <h3 class="text-2xl font-semibold text-gray-700">{{ $bookings->where('status', 'confirmed')->where('ceremony_date', '>', now())->count() }}</h3>
                </div>
            </div>
        </div>

        <!-- Stats Card 2 -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 text-green-500">
                    <i class="fas fa-check-circle text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-gray-500 text-sm">Completed Ceremonies</p>
                    <h3 class="text-2xl font-semibold text-gray-700">{{ $bookings->where('status', 'completed')->count() }}</h3>
                </div>
            </div>
        </div>

        <!-- Stats Card 3 -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-500">
                    <i class="fas fa-rupee-sign text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-gray-500 text-sm">Total Earnings</p>
                    <h3 class="text-2xl font-semibold text-gray-700">₹{{ $bookings->where('payment_status', 'paid')->sum('amount') }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Upcoming Bookings -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Upcoming Bookings</h2>
            </div>
            <div class="p-6">
                @if($bookings->where('ceremony_date', '>', now())->count() > 0)
                    <div class="space-y-4">
                        @foreach($bookings->where('ceremony_date', '>', now())->take(3) as $booking)
                            <div class="border-b border-gray-200 pb-4 last:border-0 last:pb-0">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-md font-semibold text-gray-800">{{ $booking->ceremony_type }}</h3>
                                        <p class="text-sm text-gray-600">{{ $booking->ceremony_date->format('M d, Y - h:i A') }}</p>
                                        <p class="text-sm text-gray-600">{{ $booking->location }}</p>
                                    </div>
                                    <span class="px-2 py-1 text-xs rounded-full {{ $booking->status == 'confirmed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-4 text-center">
                        <a href="{{ route('pandit.bookings') }}" class="text-orange-500 hover:underline">View All Bookings</a>
                    </div>
                @else
                    <p class="text-gray-500 text-center py-4">No upcoming bookings</p>
                @endif
            </div>
        </div>

        <!-- Profile Summary -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Profile Summary</h2>
            </div>
            <div class="p-6">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 rounded-full bg-gray-300 flex items-center justify-center overflow-hidden">
                        @if($pandit->profile_image)
                            <img src="{{ asset('storage/' . $pandit->profile_image) }}" alt="{{ $pandit->name }}" class="w-full h-full object-cover">
                        @else
                            <i class="fas fa-user text-gray-500 text-2xl"></i>
                        @endif
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $pandit->name }}</h3>
                        <p class="text-sm text-gray-600">{{ $pandit->specialization ?? 'General Pandit' }}</p>
                    </div>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center">
                        <i class="fas fa-envelope text-gray-500 w-6"></i>
                        <span class="text-gray-700 ml-2">{{ $pandit->email }}</span>
                    </div>
                    @if($pandit->phone)
                    <div class="flex items-center">
                        <i class="fas fa-phone text-gray-500 w-6"></i>
                        <span class="text-gray-700 ml-2">{{ $pandit->phone }}</span>
                    </div>
                    @endif
                    @if($pandit->location)
                    <div class="flex items-center">
                        <i class="fas fa-map-marker-alt text-gray-500 w-6"></i>
                        <span class="text-gray-700 ml-2">{{ $pandit->location }}</span>
                    </div>
                    @endif
                </div>
                <div class="mt-6 text-center">
                    <a href="{{ route('pandit.profile') }}" class="text-orange-500 hover:underline">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
@endsection