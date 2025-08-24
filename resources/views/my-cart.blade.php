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
        <div class="col-span-2 space-y-4" id="cartItems">
            <!-- Dynamic cart items will be injected here -->
        </div>

        <!-- Right Section (Order Summary) -->
        <div class="bg-orange-100 rounded-lg p-6 shadow">
            <h3 class="font-semibold text-lg mb-4">Order Summary</h3>
            <div class="space-y-2 text-gray-700">
                <div class="flex justify-between">
                    <span>Subtotal</span>
                    <span id="subtotal">INR 0</span>
                </div>
                <div class="flex justify-between">
                    <span>Shipping Fee</span>
                    <span id="shipping">INR 50</span>
                </div>
                <div class="flex justify-between">
                    <span>GST (18%)</span>
                    <span id="gst">INR 0</span>
                </div>
                <hr class="my-2">
                <div class="flex justify-between font-semibold text-lg text-orange-600">
                    <span>Total</span>
                    <span id="total">INR 0</span>
                </div>
            </div>

            <!-- Coupon -->
            <div class="flex mt-4">
                <input type="text" placeholder="Coupon Code" class="flex-1 border border-gray-300 rounded-l px-3 py-2">
                <button class="bg-orange-500 hover:bg-orange-600 text-white px-4 rounded-r">Apply</button>
            </div>

            <a href="#" id="checkoutBtn" class="w-full mt-6 bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-lg text-lg font-semibold">
                Proceed to Checkout
            </a>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cartContainer = document.getElementById('cartItems');
        const subtotalEl = document.getElementById('subtotal');
        const gstEl = document.getElementById('gst');
        const totalEl = document.getElementById('total');
        const shippingFee = 50;

        // Fetch cart from localStorage
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        function renderCart() {
            cartContainer.innerHTML = '';
            let subtotal = 0;

            cart.forEach((item, index) => {
                const itemTotal = item.price * item.quantity;
                subtotal += itemTotal;

                const div = document.createElement('div');
                div.classList.add('bg-white', 'rounded-lg', 'shadow', 'p-4', 'flex', 'items-center', 'justify-between');
                div.innerHTML = `
                <div class="flex items-center">
                    <img src="${item.image}" alt="${item.name}" class="w-20 h-20 rounded-lg mr-4">
                    <div>
                        <h3 class="font-semibold text-lg">${item.name}</h3>
                        <p class="text-gray-500 text-sm">${item.description}</p>
                        <div class="flex items-center mt-2">
                            <button class="px-3 py-1 bg-gray-200 rounded-l" data-index="${index}" data-action="decrease">−</button>
                            <input type="text" value="${item.quantity}" class="w-10 text-center border-t border-b" readonly>
                            <button class="px-3 py-1 bg-gray-200 rounded-r" data-index="${index}" data-action="increase">+</button>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <p class="font-semibold">INR ${itemTotal}</p>
                    <div class="flex items-center text-sm text-gray-500 mt-2 space-x-2">
                        <span style="cursor:pointer;" data-index="${index}" class="removeItem">🗑 Remove</span>
                    </div>
                </div>
            `;
                cartContainer.appendChild(div);
            });

            const gst = Math.round(subtotal * 0.18);
            const total = subtotal + gst + shippingFee;

            subtotalEl.textContent = 'INR ' + subtotal;
            gstEl.textContent = 'INR ' + gst;
            totalEl.textContent = 'INR ' + total;

            addEventListeners();
        }

        function addEventListeners() {
            // Increase / Decrease Quantity
            document.querySelectorAll('button[data-action]').forEach(btn => {
                btn.addEventListener('click', function() {
                    const index = this.dataset.index;
                    if (this.dataset.action === 'increase') cart[index].quantity++;
                    if (this.dataset.action === 'decrease' && cart[index].quantity > 1) cart[index].quantity--;
                    localStorage.setItem('cart', JSON.stringify(cart));
                    renderCart();
                });
            });

            // Remove Item
            document.querySelectorAll('.removeItem').forEach(btn => {
                btn.addEventListener('click', function() {
                    const index = this.dataset.index;
                    cart.splice(index, 1);
                    localStorage.setItem('cart', JSON.stringify(cart));
                    renderCart();
                });
            });
        }

        renderCart();
        document.getElementById('checkoutBtn').addEventListener('click', function(e) {
            e.preventDefault();

            // Get all item IDs from cart
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const itemIds = cart.map(item => item.id);

            if (itemIds.length === 0) {
                alert('Your cart is empty!');
                return;
            }

            // Convert IDs to query params
            const params = new URLSearchParams();
            itemIds.forEach(id => params.append('items[]', id));

            // Redirect to checkout with item IDs
            window.location.href = "{{ route('checkout') }}?" + params.toString();
        });

    });
</script>
@endsection