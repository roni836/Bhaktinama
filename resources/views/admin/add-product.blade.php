@extends('layouts.admin')

@section('title', 'Add New Product')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-2xl mx-auto">
        <div class="flex items-center mb-6">
            <a href="{{ route('admin.products') }}" class="flex items-center text-orange-500 hover:text-orange-600 mr-4">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Go Back
            </a>
            <h1 class="text-2xl font-bold text-gray-800">Add New Product</h1>
        </div>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Product Name *</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <select id="product_category_id" name="product_category_id" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                        <option value="">Select Category</option>
                        @foreach ($productCategories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Button -->
                <a href="#" id="openCategoryModal"
                    class="text-orange-500 text-sm font-medium hover:text-orange-600"> + Product Category
                </a>

                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price (₹) *</label>
                    <input type="number" id="price" name="price" value="{{ old('price') }}" step="0.01" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-2">
                    <select id="service_id" name="service_id" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                        <option value="">Select Service</option>
                        @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->title }}</option>
                        @endforeach
                    </select>
                     @error('service_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-2">
                    <select id="location_id" name="location_id" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                        <option value="">Select Location</option>
                        @foreach ($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                         @error('location_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    </select>
                </div>

                <div>
                    <label for="quantity" class="block text-sm font-medium text-gray-700 mb-2">Stock Quantity *</label>
                    <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('quantity')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                    <textarea id="description" name="description" rows="4" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
                    @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Product Image</label>
                    <input type="file" id="image" name="image" accept="image/*"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="mr-2">
                        <span class="text-sm font-medium text-gray-700">Active</span>
                    </label>
                </div>
            </div>

            <div class="flex justify-end space-x-4 mt-6">
                <a href="{{ route('admin.products') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-[#1F2B50] text-white rounded-md hover:bg-[#1F2B50]">Add Product</button>
            </div>
        </form>
        <!-- Modal -->
        <div id="categoryModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex items-center justify-center">
            <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6 relative">
                <!-- Close button -->
                <button type="button" id="closeCategoryModal" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                    ✖
                </button>

                <h2 class="text-xl font-semibold mb-4">Add Service Category</h2>

                <!-- Normal POST form -->
                <form action="{{ route('admin.product-categories.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Category Name</label>
                        <input type="text" id="name" name="name" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" name="save_category"
                            class="bg-orange-500 text-white px-4 py-2 rounded-md hover:bg-orange-600 transition">
                            Save Category
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<script>
    const modal = document.getElementById('categoryModal');
    const openBtn = document.getElementById('openCategoryModal');
    const closeBtn = document.getElementById('closeCategoryModal');

    openBtn.addEventListener('click', function(e) {
        e.preventDefault();
        modal.classList.remove('hidden');
    });

    closeBtn.addEventListener('click', function() {
        modal.classList.add('hidden');
    });
</script>
@endsection