@extends('layouts.app')

@section('title', 'Service Booking')

@section('content')
<div class="bg-white font-sans">
    <!-- Go Back Button -->
    <div class="bg-[#FBC48D] p-3">
        <a href="/" class="text-orange-600 px-12 flex items-center">
            ← Go Back
        </a>
    </div>

    <div class="max-w-4xl mx-auto p-6">
        <!-- Success Message -->
        @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
        @endif

        <!-- Validation Errors -->
        @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('service-booking') }}" method="POST" class="space-y-6">
            @csrf

            <h2 class="text-lg font-semibold mb-4">Personal Details</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm mb-1">Full Name *</label>
                    <input type="text" name="full_name" value="{{ old('full_name') }}" placeholder="Enter your full name"
                        class="w-full border rounded p-2  ">
                    <div>
                        <label class="block text-sm mb-1">Email Address *</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email address"
                            class="w-full border rounded p-2 ">
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm mb-1">Phone Number *</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Enter your phone number"
                        class="w-full border rounded p-2 ">
                </div>

                <h2 class="text-lg font-semibold mb-4">Address Details</h2>
                <div class="mb-4">
                    <label class="block text-sm mb-1">Street Address *</label>
                    <input type="text" name="street" value="{{ old('street') }}" placeholder="Enter your street address"
                        class="w-full border rounded p-2 ">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm mb-1">City *</label>
                        <input type="text" name="city" value="{{ old('city') }}" placeholder="Enter your city"
                            class="w-full border rounded p-2 ">
                    </div>
                    <div>
                        <label class="block text-sm mb-1">State *</label>
                        <input type="text" name="state" value="{{ old('state') }}" placeholder="Enter your state"
                            class="w-full border rounded p-2 ">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-sm mb-1">ZIP Code *</label>
                        <input type="text" name="zip" value="{{ old('zip') }}" placeholder="Enter your ZIP code"
                            class="w-full border rounded p-2">
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Landmark</label>
                        <input type="text" name="landmark" value="{{ old('landmark') }}" placeholder="Enter a nearby landmark"
                            class="w-full border rounded p-2 ">
                    </div>
                </div>

                <h2 class="text-lg font-semibold mb-4">Additional Information</h2>
                <div class="mb-4">
                    <label class="block text-sm mb-1">Special Requests or Instructions</label>
                    <textarea name="special_requests" placeholder="Enter any special requests or instructions for the priest"
                        class="w-full border rounded p-2 h-24">{{ old('special_requests') }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm mb-1">Ceremony Date *</label>
                        <input type="date" name="ceremony_date" value="{{ old('ceremony_date') }}"
                            class="w-full border rounded p-2 ">
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Timing *</label>
                        <input type="text" name="ceremony_time" value="{{ old('ceremony_time') }}" placeholder="10:00 AM - 12:00 PM"
                            class="w-full border rounded p-2 focus:border-orange-400">
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm mb-1">Preferred Language *</label>
                    <select name="language" class="w-full border rounded p-2 focus:outline-none focus:ring focus:border-orange-400">
                        <option value="">Select language</option>
                        <option value="hindi" {{ old('language') == 'hindi' ? 'selected' : '' }}>Hindi</option>
                        <option value="english" {{ old('language') == 'english' ? 'selected' : '' }}>English</option>
                    </select>
                </div>

                <!-- Buttons -->
                <div class="flex justify-between">
                    <a href="/" class="px-6 py-2 border rounded text-gray-700 hover:bg-gray-100">← Back</a>
                    <a href="{{ route('select-pandit') }}" class="px-6 py-2 bg-orange-500 text-white rounded hover:bg-orange-600">Continue →</a>
                </div>
        </form>
    </div>
</div>
@endsection