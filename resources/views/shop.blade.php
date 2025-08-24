@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

<style>
    body {
        font-family: 'Inter', sans-serif;
    }

    /* Custom gradient for buttons */
    .btn-gradient {
        background: linear-gradient(to right, #FF7B00, #FF9F00);
    }

    .text-gradient {
        background: linear-gradient(to right, #FF7B00, #FF9F00);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>


<div class="bg-white text-gray-800">
    <!-- Shop Hero Section -->
    <section class="relative bg-cover bg-center h-[400px] flex items-center justify-center rounded-b-lg overflow-hidden" style="background-image: url('{{ asset('images/SHOP PUJA SAMAGARI.jpg') }}')">
        <div class="absolute inset-0 bg-black opacity-50 rounded-b-lg"></div>
        <div class="relative z-10 text-white text-center px-4 max-w-4xl">
            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4 rounded-lg">
                Traditional Puja Essentials
            </h1>
            <p class="text-lg md:text-xl rounded-lg">
                Discover authentic, handcrafted Puja items sourced directly from artisans. Our products maintain the sacred traditions while meeting modern quality standards.
            </p>
        </div>
    </section>

    <!-- Shop by Category Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 text-center">
            <div class="flex justify-between items-center mb-12 w-full px-4">
                <h2 class="text-3xl font-bold text-gradient">Shop by Category</h2>
                <a href="{{ route('my-cart') }}" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-6 rounded-full transition duration-300 flex items-center space-x-2">
                    <i class="fas fa-shopping-cart"></i>
                    <span>My Cart (<span id="cartCount">0</span>)</span>
                </a>
            </div>

            <p class="text-gray-600 mb-12">Browse our carefully curated collection of authentic puja essentials, each crafted with devotion and attention to detail</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($categories as $category)
                <div class="bg-gray-100 rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105">
                    <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">{{ $category->name }}</h3>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-12 text-gradient">Featured Products</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

                @foreach($shop as $item)
                <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105">
                    <img src="{{ asset('uploads/' . $item->image) }}" alt="Brass Puja Thali Set" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4 text-left">
                        <h3 class="text-lg font-semibold mb-1">{{$item->name}}</h3>
                        <p class="text-gray-600 text-sm mb-2">{{$item->description}}</p>
                        <div class="flex justify-between items-center mb-2">
                            <div class="flex text-yellow-500 text-sm mr-2">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-gray-500 text-sm">{{$item->quantity}}Left</span>
                        </div>
                        <p class="text-lg font-semibold text-orange-600 mb-2">INR {{$item->price}}</p>
                        <button class="add-to-cart w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 rounded-full shadow-md transition duration-300"
                            data-id="{{ $item->id }}"
                            data-name="{{ $item->name }}"
                            data-price="{{ $item->price }}"
                            data-image="{{ asset('uploads/' . $item->image) }}"
                            data-description="{{ $item->description }}">
                            <i class="fas fa-shopping-cart"></i>
                        </button>
                    </div>

                </div>
                @endforeach
            </div>

        </div>

        <div class="flex justify-center items-center space-x-2 mt-12">
            <button class="w-10 h-10 rounded-full bg-orange-500 text-white font-semibold flex items-center justify-center shadow-md">1</button>
            <button class="w-10 h-10 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300 font-semibold flex items-center justify-center transition duration-300">2</button>
            <button class="w-10 h-10 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300 font-semibold flex items-center justify-center transition duration-300">3</button>
            <button class="w-10 h-10 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300 font-semibold flex items-center justify-center transition duration-300">4</button>
            <button class="w-10 h-10 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300 font-semibold flex items-center justify-center transition duration-300">5</button>
            <button class="w-10 h-10 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300 font-semibold flex items-center justify-center transition duration-300">6</button>
            <button class="w-10 h-10 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300 font-semibold flex items-center justify-center transition duration-300">
                <i class="fas fa-arrow-right"></i>
            </button>
        </div>
</div>
</section>
<!-- Modal Background -->
<div id="productModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
    <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6 relative overflow-y-auto max-h-[90vh]">

        <!-- Close Button -->
        <button id="closeModal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-xl">✕</button>

        <!-- Product Image -->
        <img id="modalImage" class="w-full h-56 object-contain rounded mb-4" src="" alt="Product Image">

        <!-- Product Title -->
        <h2 id="modalName" class="text-2xl font-bold mb-2"></h2>

        <!-- Price -->
        <p class="text-lg text-orange-500 font-semibold mb-4">₹ <span id="modalPrice">320</span></p>

        <!-- Description -->
        <p id="modalDescription" class="text-gray-600 text-sm mb-4">
            Complete brass puja thali set featuring intricate traditional designs...
        </p>

        <!-- Quantity Selector -->
        <div class="flex items-center space-x-4 mb-4">
            <label for="quantity" class="text-gray-700 font-medium">Quantity:</label>
            <input type="number" id="quantity" class="w-16 border rounded px-2 py-1 text-center" value="1" min="1">
        </div>

        <!-- Add to Cart Button -->
        <button  id="modalAddToCart" class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-lg text-lg font-semibold">
            🛒 Add to Cart
        </button>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('productModal');
        const closeModal = document.getElementById('closeModal');
        const modalImage = document.getElementById('modalImage');
        const modalName = document.getElementById('modalName');
        const modalPrice = document.getElementById('modalPrice');
        const modalDescription = document.getElementById('modalDescription');
        const quantityInput = document.getElementById('quantity');
        const addToCartBtn = document.getElementById('modalAddToCart');

        let currentProduct = {}; // Store clicked product info

        // Open modal
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function() {
                currentProduct = {
                    id: this.dataset.id,
                    name: this.dataset.name,
                    price: parseFloat(this.dataset.price),
                    image: this.dataset.image,
                    description: this.dataset.description
                };

                modalImage.src = currentProduct.image;
                modalName.textContent = currentProduct.name;
                modalPrice.textContent = currentProduct.price;
                quantityInput.value = 1;

                modal.classList.remove('hidden');
            });
        });

        // Close modal
        closeModal.addEventListener('click', () => modal.classList.add('hidden'));
        modal.addEventListener('click', (e) => {
            if (e.target === modal) modal.classList.add('hidden');
        });

        // Add to cart using localStorage
        addToCartBtn.addEventListener('click', function() {
            const quantity = parseInt(quantityInput.value);
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            // Check if product already exists
            let existing = cart.find(item => item.id === currentProduct.id);
            if (existing) {
                existing.quantity += quantity;
            } else {
                cart.push({
                    ...currentProduct,
                    quantity
                });
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            alert(currentProduct.name + " added to cart!");
            modal.classList.add('hidden');

            // Optional: update cart count in header
            const cartCount = cart.reduce((sum, item) => sum + item.quantity, 0);
            const countEl = document.getElementById('cartCount');
            if (countEl) countEl.textContent = cartCount;
        });
    });
</script>


@endsection