@extends('layouts.admin')

@section('title', 'Add New Service')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="max-w-4xl mx-auto">
            <!-- Header with Go Back button -->
            <div class="flex items-center mb-6">
                <a href="{{ route('admin.services') }}" class="flex items-center text-orange-500 hover:text-orange-600 mr-4">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Go Back
                </a>
                <h1 class="text-2xl font-bold text-gray-800">Add New Service</h1>
            </div>

            <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data"
                class="bg-white rounded-lg shadow p-6">
                @csrf

                <!-- Service Images Upload -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Service Images</label>
                    <div
                        class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-orange-400 transition-colors">
                        <div class="mb-4">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="text-gray-600">
                            <label for="images" class="cursor-pointer">
                                <span class="text-orange-500 font-medium">Click to upload images</span>
                                <input type="file" id="images" name="images[]" multiple accept="image/*"
                                    class="hidden">
                            </label>
                            <p class="text-sm mt-1">PNG, JPG up to 5MB (Max 5 images)</p>
                        </div>
                    </div>
                    @error('images')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Service Name -->
                    <div class="md:col-span-2">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Service Name *</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" required
                            placeholder="Enter the Service name"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Service Type -->
                    <div>
                        <label for="service_type" class="block text-sm font-medium text-gray-700 mb-2">Service Type</label>
                        <select id="service_type" name="service_type"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                            <option value="">Select Type</option>
                            <option value="puja" {{ old('service_type') == 'puja' ? 'selected' : '' }}>Puja</option>
                            <option value="ceremony" {{ old('service_type') == 'ceremony' ? 'selected' : '' }}>Ceremony
                            </option>
                            <option value="ritual" {{ old('service_type') == 'ritual' ? 'selected' : '' }}>Ritual</option>
                            <option value="consultation" {{ old('service_type') == 'consultation' ? 'selected' : '' }}>
                                Consultation</option>
                            <option value="other" {{ old('service_type') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('service_type')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Location (State Dropdown) -->
                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Location (State)</label>
                        <select id="location" name="location" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                            <option value="">Select a State</option>
                            @foreach ($states as $state)
                                <option value="{{ $state }}" {{ old('location') == $state ? 'selected' : '' }}>
                                    {{ $state }}
                                </option>
                            @endforeach
                        </select>
                        @error('location')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <!-- Short Description -->
                    <div class="md:col-span-2">
                        <label for="short_description" class="block text-sm font-medium text-gray-700 mb-2">Short
                            Description</label>
                        <textarea id="short_description" name="short_description" rows="3" placeholder="Enter the short Description"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">{{ old('short_description') }}</textarea>
                        @error('short_description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Introduction -->
                    <div class="md:col-span-2">
                        <label for="introduction" class="block text-sm font-medium text-gray-700 mb-2">Introduction</label>
                        <textarea id="introduction" name="introduction" rows="4" placeholder="Enter the Introduction About service"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">{{ old('introduction') }}</textarea>
                        @error('introduction')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Importance of Service -->
                    <div class="md:col-span-2">
                        <label for="importance" class="block text-sm font-medium text-gray-700 mb-2">Importance of
                            Service</label>
                        <textarea id="importance" name="importance" rows="4" placeholder="Enter the Importance of service"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">{{ old('importance') }}</textarea>
                        @error('importance')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Traditions & Cultural Significance -->
                    <div class="md:col-span-2">
                        <label for="traditions" class="block text-sm font-medium text-gray-700 mb-2">Traditions & Cultural
                            Significance</label>
                        <textarea id="traditions" name="traditions" rows="4" placeholder="Enter Traditions & Cultural Significance"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">{{ old('traditions') }}</textarea>
                        @error('traditions')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Packages Section -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Add package</label>
                        <div id="packages-container">
                            <div class="package-row flex gap-4 mb-3">
                                <div class="flex-1">
                                    <input type="text" name="packages[0][name]" placeholder="Enter the package"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                                </div>
                                <div class="flex-1">
                                    <input type="number" name="packages[0][price]" placeholder="Enter the Amount"
                                        step="0.01"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                                </div>
                            </div>
                        </div>
                        <button type="button" id="add-package"
                            class="text-orange-500 text-sm font-medium hover:text-orange-600">
                            + Add package
                        </button>
                    </div>

                    <!-- FAQs Section -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">FAQs</label>
                        <div id="faqs-container">
                            <div class="faq-row mb-3">
                                <input type="text" name="faqs[0][question]" placeholder="Enter the FAQ"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 mb-2">
                                <textarea name="faqs[0][answer]" rows="2" placeholder="Enter the answer"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500"></textarea>
                            </div>
                        </div>
                        <button type="button" id="add-faq"
                            class="text-orange-500 text-sm font-medium hover:text-orange-600">
                            + Add FAQ
                        </button>
                    </div>

                    <!-- Status -->
                    <div class="md:col-span-2">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" value="1"
                                {{ old('is_active', true) ? 'checked' : '' }} class="mr-2">
                            <span class="text-sm font-medium text-gray-700">Active</span>
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center mt-8">
                    <button type="submit"
                        class="px-8 py-3 bg-blue-900 text-white rounded-md hover:bg-blue-800 font-medium">
                        Add Service
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Add Package functionality
        document.getElementById('add-package').addEventListener('click', function() {
            const container = document.getElementById('packages-container');
            const packageCount = container.children.length;
            const newPackage = document.createElement('div');
            newPackage.className = 'package-row flex gap-4 mb-3';
            newPackage.innerHTML = `
        <div class="flex-1">
            <input type="text" name="packages[${packageCount}][name]" placeholder="Enter the package" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
        </div>
        <div class="flex-1">
            <input type="number" name="packages[${packageCount}][price]" placeholder="Enter the Amount" step="0.01" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
        </div>
        <button type="button" class="remove-package text-red-500 hover:text-red-700">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    `;
            container.appendChild(newPackage);

            // Add remove functionality
            newPackage.querySelector('.remove-package').addEventListener('click', function() {
                newPackage.remove();
            });
        });

        // Add FAQ functionality
        document.getElementById('add-faq').addEventListener('click', function() {
            const container = document.getElementById('faqs-container');
            const faqCount = container.children.length;
            const newFaq = document.createElement('div');
            newFaq.className = 'faq-row mb-3';
            newFaq.innerHTML = `
        <div class="flex justify-between items-start mb-2">
            <input type="text" name="faqs[${faqCount}][question]" placeholder="Enter the FAQ" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 mr-2">
            <button type="button" class="remove-faq text-red-500 hover:text-red-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <textarea name="faqs[${faqCount}][answer]" rows="2" placeholder="Enter the answer" 
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500"></textarea>
    `;
            container.appendChild(newFaq);

            // Add remove functionality
            newFaq.querySelector('.remove-faq').addEventListener('click', function() {
                newFaq.remove();
            });
        });

        // Image upload preview
        document.getElementById('images').addEventListener('change', function(e) {
            // Add image preview functionality here if needed
        });
    </script>

@endsection
