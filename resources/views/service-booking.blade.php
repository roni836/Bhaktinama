@extends('layouts.app')

@section('title', 'Service Booking')

@section('content')
<div class="bg-[#FBC48D] p-2">
    <a href="/" class="text-orange-600 px-12 flex items-center">
        ← Go Back
    </a>
</div>


<div class=" min-h-screen py-10" x-data="{ step: 1, selectedPandit: null }">

    <!-- Stepper Navigation -->
    <div class="max-w-3xl mx-auto mb-8">
        <div class="flex justify-between items-center">
            <template x-for="(label, index) in ['Details', 'Select Pandit', 'Payment', 'Confirm']" :key="index">
                <div class="flex-1 flex items-center">
                    <div class="relative">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center"
                            :class="step >= index + 1 ? 'bg-orange-500 text-white' : 'bg-gray-200 text-gray-500'">
                            <span x-text="index + 1"></span>
                        </div>
                        <p class="text-sm mt-2 text-center" x-text="label"></p>
                    </div>
                    <div class="flex-1 h-1 bg-gray-200 mx-2"
                        :class="step > index + 1 ? 'bg-orange-500' : ''"
                        x-show="index < 3"></div>
                </div>
            </template>
        </div>
    </div>

    <!-- Step Content -->
    <div class="max-w-4xl mx-auto  rounded-lg p-6">

        <!-- STEP 1: DETAILS -->
        <!-- Form starts here -->
        <form method="POST" action="{{ route('service-booking.submit') }}" class="max-w-4xl mx-auto rounded-lg p-6">
            @csrf

            <!-- ✅ Hidden fields for Alpine data -->
             <input type="hidden" name="service_id" value="{{ $service->id }}">
            <input type="hidden" name="pandit_id" :value="selectedPandit">
            <input type="hidden" name="payment_method" :value="payment">

            <!-- ✅ Show validation errors -->
            @if($errors->any())
            <div class="bg-red-500 text-white p-2 mb-4">
                @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif
            <div x-show="step === 1">

                <div class="bg-white p-6 rounded-lg shadow font-sans">
                    <!-- Personal Details -->
                    <h2 class="text-lg font-semibold mb-4">Personal Details</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <!-- Full Name -->
                        <div>
                            <label class="block text-sm mb-1">Full Name *</label>
                            <div class="flex items-center border rounded px-3">
                                <span class="text-gray-400 mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5.121 17.804A7 7 0 0112 15a7 7 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </span>
                                <input type="text" name="name" placeholder="Enter your full name"
                                    class="w-full p-2 outline-none">
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div>
                            <label class="block text-sm mb-1">Email Address *</label>
                            <div class="flex items-center border rounded px-3">
                                <span class="text-gray-400 mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 12H8m0 0l4-4m-4 4l4 4" />
                                    </svg>
                                </span>
                                <input type="email" name="email" placeholder="Enter your email address"
                                    class="w-full p-2 outline-none">
                            </div>
                        </div>

                        <!-- Phone Number -->
                        <div class="md:col-span-2">
                            <label class="block text-sm mb-1">Phone Number *</label>
                            <div class="flex items-center border rounded px-3">
                                <span class="text-gray-400 mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.586a1 1 0 01.707.293l2.414 2.414a1 1 0 010 1.414L9.414 9.414a1 1 0 000 1.414l1.586 1.586a1 1 0 001.414 0l2.414-2.414a1 1 0 011.414 0L21 13.586a1 1 0 010 1.414l-2.414 2.414a2 2 0 01-1.414.586H5a2 2 0 01-2-2V5z" />
                                    </svg>
                                </span>
                                <input type="text" name="phone" placeholder="Enter your phone number"
                                    class="w-full p-2 outline-none">
                            </div>
                        </div>
                    </div>

                    <!-- Address Details -->
                    <h2 class="text-lg font-semibold mb-4">Address Details</h2>
                    <div class="mb-4">
                        <label class="block text-sm mb-1">Street Address *</label>
                        <input type="text" name="street_address" placeholder="Enter your street address"
                            class="w-full border rounded p-2">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm mb-1">City *</label>
                            <input type="text" name="city" placeholder="Enter your city"
                                class="w-full border rounded p-2">
                        </div>
                        <div>
                            <label class="block text-sm mb-1">State *</label>
                            <input type="text" name="state" placeholder="Enter your state"
                                class="w-full border rounded p-2">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div>
                            <label class="block text-sm mb-1">ZIP Code *</label>
                            <input type="text" name="zip" placeholder="Enter your ZIP code"
                                class="w-full border rounded p-2">
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Landmark</label>
                            <input type="text" name="landmark" placeholder="Enter a nearby landmark"
                                class="w-full border rounded p-2">
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <h2 class="text-lg font-semibold mb-4">Additional Information</h2>
                    <div class="mb-4">
                        <label class="block text-sm mb-1">Special Requests or Instructions</label>
                        <textarea name="special_requests" placeholder="Enter any special requests or instructions for the priest"
                            class="w-full border rounded p-2 h-24"></textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm mb-1">Ceremony Date *</label>
                            <input type="date" name="ceremony_date"
                                class="w-full border rounded p-2">
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Timing *</label>
                            <input type="text" name="ceremony_time" placeholder="10:00 AM - 12:00 PM"
                                class="w-full border rounded p-2">
                        </div>
                    </div>
                    <div class="mb-6">
                        <label class="block text-sm mb-1">Preferred Language *</label>
                        <select name="language"
                            class="w-full border rounded p-2">
                            <option value="">Select language</option>
                            <option value="hindi">Hindi</option>
                            <option value="english">English</option>
                        </select>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-between mt-6">
                        <a href="/" class="px-6 py-2 border rounded text-gray-700 hover:bg-gray-100">← Back</a>
                        <button type="button" class="bg-orange-500 text-white px-5 py-2 rounded"
                            @click="step = 2">
                            Continue
                        </button>
                    </div>
                </div>

            </div>

            <!-- STEP 2: SELECT PANDIT -->
            <div x-show="step === 2">
                <div class="max-w-7xl mx-auto px-4 py-10">
                    <h2 class="text-2xl font-bold text-center text-orange-600 mb-2">
                        Pandits List By Patna Location
                    </h2>
                    <div class="flex flex-col justify-center items-start">
                        <h2 class="text-2xl font-bold text-center text-orange-600 mb-2">
                            Our Experienced Pandits
                        </h2>
                        <p class="text-center text-gray-600 mb-8">
                            Choose from our carefully selected pandits, each specializing in various religious ceremonies and rituals
                        </p>


                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($pandits as $p)
                        <div class="bg-white shadow rounded-lg p-4 flex flex-col items-center text-center hover:shadow-lg transition">
                            <div class="mb-4 flex">
                                <img src="{{ $p->user->avatar_url ?? 'https://placehold.co/100x100' }}"
                                    class="w-18 h-18 rounded-full object-cover mb-4 border-4 border-orange-200"
                                    alt="Pandit Image">

                                <div class="ml-4 flex flex-col mb-2 text-start">
                                    <h3 class="font-semibold text-lg">{{ $p->user->name }}</h3>
                                    <p class="text-gray-500 text-sm mb-4">{{ $p->user->bio ?? 'Expert in Vedic rituals' }}</p>

                                </div>

                            </div>
                            <ul class="text-gray-700 text-sm space-y-2 mb-6 text-left">
                                @foreach($p->user->specializations ?? [] as $specialization)
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 text-blue-500 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                    {{ $specialization }}
                                </li>
                                @endforeach
                            </ul>


                            <button type="button"
                                @click="selectedPandit = {{ $p->id }}; step = 3"
                                class="bg-orange-500 text-white px-6 py-2 rounded-full font-semibold hover:bg-orange-600 transition">
                                Select Pandit
                            </button>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="flex justify-start mt-6">
                    <button type="button" class="bg-gray-300 text-gray-700 px-5 py-2 rounded mr-3"
                        @click="step = 1">Back</button>
                </div>
            </div>
            <div x-show="step === 3">
                <h2 class="text-xl font-bold mb-4">Choose Payment Method</h2>
                <div class="space-y-4">
                    <label class="flex items-center space-x-3 border p-4 rounded cursor-pointer hover:border-orange-500"
                        :class="payment === 'online' ? 'border-orange-500' : ''">
                        <input type="radio" name="payment_method" value="online" x-model="payment" class="hidden">
                        <span class="w-5 h-5 border rounded-full flex items-center justify-center">
                            <span x-show="payment === 'online'" class="w-3 h-3 bg-orange-500 rounded-full"></span>
                        </span>
                        <span class="text-gray-700">Online Payment</span>
                    </label>

                    <label class="flex items-center space-x-3 border p-4 rounded cursor-pointer hover:border-orange-500"
                        :class="payment === 'cash' ? 'border-orange-500' : ''">
                        <input type="radio" name="payment_method" value="cash" x-model="payment" class="hidden">
                        <span class="w-5 h-5 border rounded-full flex items-center justify-center">
                            <span x-show="payment === 'cash'" class="w-3 h-3 bg-orange-500 rounded-full"></span>
                        </span>
                        <span class="text-gray-700">Cash on Delivery</span>
                    </label>
                </div>

                <div class="flex justify-between mt-6">
                    <button type="button" class="bg-gray-300 text-gray-700 px-5 py-2 rounded"
                        @click="step = 2">Back</button>
                    <button type="button" class="bg-orange-500 text-white px-5 py-2 rounded"
                        @click="if(payment){ step = 4 } else { alert('Please select a payment method'); }">Continue</button>
                </div>
            </div>


            <!-- STEP 4: CONFIRM -->
            <div x-show="step === 4">
                <h2 class="text-xl font-bold mb-4">Confirm Booking</h2>
                <p class="mb-4 text-gray-700">Your booking is ready to confirm. Click below to finalize.</p>
                <div class="flex justify-between mt-6">
                    <button type="button" class="bg-gray-300 text-gray-700 px-5 py-2 rounded"
                        @click="step = 3">Back</button>
                    <button type="submit" class="bg-green-500 text-white px-5 py-2 rounded">
                        Confirm & Book
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection