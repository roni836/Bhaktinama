@extends('layouts.app')

@section('title', 'My Cart')

@section('content')
<div class="bg-[#FBC48D] p-2">
    <a href="/" class="text-orange-600 px-12 flex items-center">
        ← Go Back
    </a>
</div>
<div class="min-h-screen bg-gray-50 p-6">


    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Section (Cart Items) -->
        <div class="col-span-2 space-y-4">
            <!-- Cart Item -->
            <div class="bg-white rounded-lg shadow p-4 flex items-center justify-between">
                <div class="flex items-center">
                    <img src="https://placehold.co/80x80" alt="Item" class="w-20 h-20 rounded-lg mr-4">
                    <div>
                        <h3 class="font-semibold text-lg">Sandalwood Incense Sticks</h3>
                        <p class="text-gray-500 text-sm">Premium Quality Pack of 20 sticks</p>
                        <!-- Quantity Controls -->
                        <div class="flex items-center mt-2">
                            <button class="px-3 py-1 bg-gray-200 rounded-l">−</button>
                            <input type="text" value="1" class="w-10 text-center border-t border-b">
                            <button class="px-3 py-1 bg-gray-200 rounded-r">+</button>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <p class="font-semibold">INR 999</p>
                    <div class="flex items-center text-sm text-gray-500 mt-2 space-x-2">
                        <span>♡ Save</span>
                        <span>🗑 Remove</span>
                    </div>
                </div>
            </div>

            <!-- Repeat for more items -->
            <div class="bg-white rounded-lg shadow p-4 flex items-center justify-between">
                <div class="flex items-center">
                    <img src="https://placehold.co/80x80" alt="Item" class="w-20 h-20 rounded-lg mr-4">
                    <div>
                        <h3 class="font-semibold text-lg">Brass Diya Lamp</h3>
                        <p class="text-gray-500 text-sm">Hand Crafted Size: 4 inches</p>
                        <!-- Quantity Controls -->
                        <div class="flex items-center mt-2">
                            <button class="px-3 py-1 bg-gray-200 rounded-l">−</button>
                            <input type="text" value="1" class="w-10 text-center border-t border-b">
                            <button class="px-3 py-1 bg-gray-200 rounded-r">+</button>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <p class="font-semibold">INR 499</p>
                    <div class="flex items-center text-sm text-gray-500 mt-2 space-x-2">
                        <span>♡ Save</span>
                        <span>🗑 Remove</span>
                    </div>
                </div>
            </div>

            <!-- Another Item -->
            <div class="bg-white rounded-lg shadow p-4 flex items-center justify-between">
                <div class="flex items-center">
                    <img src="https://placehold.co/80x80" alt="Item" class="w-20 h-20 rounded-lg mr-4">
                    <div>
                        <h3 class="font-semibold text-lg">Temple Prasad Box</h3>
                        <p class="text-gray-500 text-sm">Fresh Daily Weight: 500g</p>
                        <!-- Quantity Controls -->
                        <div class="flex items-center mt-2">
                            <button class="px-3 py-1 bg-gray-200 rounded-l">−</button>
                            <input type="text" value="1" class="w-10 text-center border-t border-b">
                            <button class="px-3 py-1 bg-gray-200 rounded-r">+</button>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <p class="font-semibold">INR 999</p>
                    <div class="flex items-center text-sm text-gray-500 mt-2 space-x-2">
                        <span>♡ Save</span>
                        <span>🗑 Remove</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Section (Order Summary) -->
        <div class="bg-orange-100 rounded-lg p-6 shadow">
            <h3 class="font-semibold text-lg mb-4">Order Summary</h3>
            <div class="space-y-2 text-gray-700">
                <div class="flex justify-between">
                    <span>Subtotal</span>
                    <span>INR 300</span>
                </div>
                <div class="flex justify-between">
                    <span>Shipping Fee</span>
                    <span>INR 50</span>
                </div>
                <div class="flex justify-between">
                    <span>GST (18%)</span>
                    <span>INR 70</span>
                </div>
                <hr class="my-2">
                <div class="flex justify-between font-semibold text-lg text-orange-600">
                    <span>Total</span>
                    <span>INR 420</span>
                </div>
            </div>

            <!-- Coupon -->
            <div class="flex mt-4">
                <input type="text" placeholder="Coupon Code" class="flex-1 border border-gray-300 rounded-l px-3 py-2">
                <button class="bg-orange-500 hover:bg-orange-600 text-white px-4 rounded-r">Apply</button>
            </div>

            <!-- Checkout Button -->
            <button class="w-full mt-6 bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-lg text-lg font-semibold">
                Proceed to Checkout
            </button>
        </div>
    </div>
</div>
@endsection