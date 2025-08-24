@extends('layouts.app')
@section('title','Checkout')

@section('content')
<div class="min-h-[80vh] p-4">
    <div class="grid grid-cols-1 lg:grid-cols-12">
        {{-- Left Hero --}}
        <div class="relative lg:col-span-5 hidden lg:block">
            <img src="https://images.unsplash.com/photo-1566554273541-37bdcfd4c698?q=80&w=1600&auto=format&fit=crop"
                alt="Ganesh" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-orange-500/70 mix-blend-multiply"></div>
        </div>

        {{-- Right Content --}}
        <div class="lg:col-span-7">
            <div class="px-4 sm:px-6 lg:px-10 py-4 lg:py-8">
                <a href="{{ url()->previous() }}" class="inline-flex items-center text-orange-600 hover:text-orange-700 mb-4">
                    <span class="mr-2">←</span> Go Back
                </a>
                {{-- Address Preview Card --}}
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden mb-6">
                    {{-- Header: radio + orange title --}}
                    <div class="flex items-center p-4">
                        <input id="addr-default" type="radio" name="address_id" checked
                            class="accent-orange-500 w-4 h-4 shrink-0" />
                        <label for="addr-default"
                            class="ml-3 text-lg font-semibold text-orange-600 cursor-pointer">
                            Address Preview
                        </label>
                    </div>

                    {{-- Body: details + phone --}}
                    <div class="px-5 pb-5">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 text-sm text-gray-700">
                            <div>
                                <div class="font-semibold text-gray-900">{{ $address['name'] }}</div>
                                <div class="text-gray-600">{{ $address['email'] }}</div>
                                <div class="mt-2 leading-snug">
                                    {{ $address['line1'] }}<br>
                                    {{ $address['city'] }} - {{ $address['pin'] }}
                                </div>
                            </div>
                            <div class="md:text-right mt-2 md:mt-0">
                                <div class="text-gray-900 font-medium">{{ $address['phone'] }}</div>
                            </div>
                        </div>

                        {{-- Actions --}}
                        <div class="mt-4 flex flex-wrap gap-3">
                            <button type="button"
                                class="inline-flex items-center px-4 py-2 rounded-md bg-orange-500 text-white hover:bg-orange-600 transition">
                                <i class="fa-regular fa-pen-to-square mr-2"></i> Edit
                            </button>

                            <button type="button"
                                class="inline-flex items-center px-4 py-2 rounded-md bg-[#0B2747] text-white hover:bg-[#0a2140] transition">
                                <i class="fa-regular fa-trash-can mr-2"></i> Delete
                            </button>

                            <button type="button"
                                class="inline-flex items-center px-4 py-2 rounded-full border border-orange-400 text-orange-600 hover:bg-orange-50 transition">
                                + Add new Address
                            </button>
                        </div>
                    </div>
                </div>


                {{-- Items --}}
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-5 mb-6">
                    <h3 class="text-lg font-semibold text-orange-600 mb-4">Items Details</h3>
                    <div class="space-y-4">
                        @foreach($cart as $id => $item)
                        <div class="rounded-lg border border-gray-100 p-3">
                            <div class="flex items-start gap-4">
                                <img src="{{ $item['image'] }}" class="w-16 h-16 rounded-md object-cover border border-gray-200" alt="{{ $item['name'] }}">
                                <div class="flex-1">
                                    <div class="flex items-center justify-between">
                                        <div class="font-semibold text-gray-800">{{ $item['name'] }}</div>
                                        <div class="text-orange-600 font-semibold">INR {{ number_format($item['price']) }}</div>
                                    </div>
                                    <div class="text-xs text-gray-500 mt-1">Qty: {{ $item['quantity'] }}</div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>

                {{-- Totals --}}
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-5">
                    <div class="space-y-3 text-sm text-gray-600">
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span>INR {{ number_format($subtotal) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Shipping Fee</span>
                            <span>INR {{ number_format($shipping) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>GST (18%)</span>
                            <span>INR {{ number_format($gst) }}</span>
                        </div>
                        <div class="border-t border-gray-200 pt-3 flex justify-between items-center">
                            <span class="font-semibold text-gray-800">Total</span>
                            <span class="font-semibold text-orange-600 text-lg">INR {{ number_format($total) }}</span>
                        </div>
                    </div>
                    <form id="orderForm" action="{{ route('order.place') }}" method="POST">
                        @csrf
                        <input type="hidden" name="payment_method" id="paymentMethod">
                        <input type="hidden" name="cart" value='@json($cart)'>
                        <input type="hidden" name="total_amount" value="{{ $total }}">
                        <input type="hidden" name="address" value='@json($address)'>

                        <button type="button" id="continueBtn"
                            class="w-full block text-center py-3 rounded-full btn-gradient text-white font-semibold shadow hover:opacity-95">
                            Continue
                        </button>
                    </form>

                    <!-- Payment Modal -->
                    <div id="paymentModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
                        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                            <h3 class="text-lg font-semibold text-orange-600 mb-4">Select Payment Method</h3>
                            <div class="space-y-3">
                                <button type="button" class="paymentBtn w-full py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600" data-method="online">
                                    Pay Online
                                </button>
                                <button type="button" class="paymentBtn w-full py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300" data-method="cod">
                                    Cash on Delivery
                                </button>
                            </div>
                            <button id="closeModal" type="button" class="mt-4 text-sm text-gray-500 hover:text-gray-700">Cancel</button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var continueBtn = document.getElementById('continueBtn');
        var modal = document.getElementById('paymentModal');
        var closeModal = document.getElementById('closeModal');
        var paymentMethodInput = document.getElementById('paymentMethod');
        var orderForm = document.getElementById('orderForm');

        // Show payment modal
        continueBtn.addEventListener('click', function() {
            modal.classList.remove('hidden');
        });

        // Close modal
        closeModal.addEventListener('click', function() {
            modal.classList.add('hidden');
        });

        // Payment buttons
        var paymentBtns = document.querySelectorAll('.paymentBtn');
        paymentBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                var method = btn.getAttribute('data-method');
                paymentMethodInput.value = method; // set hidden input
                orderForm.submit(); // submit form
            });
        });
    });
</script>

@endsection