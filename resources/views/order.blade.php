@extends('layouts.app')

@section('title', 'Order Confirmed')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 p-6">
    <div class="bg-white rounded-xl shadow-lg max-w-md w-full p-8 text-center">
        
        {{-- Success Icon --}}
        <div class="flex justify-center mb-4">
            <svg class="w-16 h-16 text-green-500" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M5 13l4 4L19 7"></path>
            </svg>
        </div>

        {{-- Heading --}}
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Order Confirmed!</h2>

        {{-- Order ID --}}
        <p class="text-gray-600 mb-4">Thank you for your purchase. Your order ID is:</p>
        <div class="bg-gray-100 py-2 px-4 rounded-lg text-orange-600 font-semibold mb-6">
            #{{ $order->id ?? '12345' }}
        </div>

        {{-- Summary --}}
        <div class="text-left mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Order Summary</h3>
            <div class="flex justify-between text-gray-700 mb-1">
                <span>Subtotal</span>
                <span>INR {{ number_format($order->subtotal ?? 0) }}</span>
            </div>
            <div class="flex justify-between text-gray-700 mb-1">
                <span>Shipping Fee</span>
                <span>INR {{ number_format($order->shipping ?? 0) }}</span>
            </div>
            <div class="flex justify-between text-gray-700 mb-1">
                <span>GST (18%)</span>
                <span>INR {{ number_format($order->gst ?? 0) }}</span>
            </div>
            <div class="flex justify-between font-semibold text-gray-800 text-lg mt-2 border-t pt-2">
                <span>Total</span>
                <span>INR {{ number_format($order->total_amount ?? 0) }}</span>
            </div>
        </div>

        {{-- Continue Shopping Button --}}
        <a href="{{ url('/') }}" 
           class="w-full inline-block py-3 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition">
           Continue Shopping
        </a>
    </div>
</div>
@endsection
