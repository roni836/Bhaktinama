@extends('layouts.admin')

@section('title', 'Add New Pandit')

@section('content')


    {{-- ✅ Success Message --}}
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- ✅ Error Messages --}}
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="mb-6">
        <div class="flex items-center space-x-2">
            <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-orange-500">
                <i class="fas fa-arrow-left"></i> Go Back
            </a>
        </div>
        <h1 class="text-2xl font-bold text-gray-900 mt-4">Add New Pandit</h1>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <form action="{{ route('admin.pandits.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pandit Images</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                        <div class="flex justify-center">
                            <div class="text-orange-500">
                                <i class="fas fa-image text-3xl"></i>
                            </div>
                        </div>
                        <p class="mt-2 text-sm text-gray-600">Click to upload images</p>
                        <p class="text-xs text-gray-500">PNG, JPG up to 5MB (Max. 5 images)</p>
                        <input type="file" name="profile_image" multiple class="hidden" id="pandit-images">
                    </div>
                </div>

                <div>
                    <label for="pandit_name" class="block text-sm font-medium text-gray-700 mb-2">Pandit Name</label>
                    <input type="text" id="pandit_name" name="name" placeholder="Enter the pandit name"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>

                <div>
                    <label for="specialized_in" class="block text-sm font-medium text-gray-700 mb-2">Specialized In</label>
                    <input type="text" id="specialized_in" name="specialization" placeholder="Enter the skills"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500">
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



                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                    <input type="text" id="phone" name="phone" placeholder="Enter phone number"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter email address"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>

                <div>
                    <label for="experience" class="block text-sm font-medium text-gray-700 mb-2">Years of Experience</label>
                    <input type="number" id="experience" name="experience" placeholder="Enter years of experience"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>

                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea id="description" name="description" rows="4" placeholder="Enter the description"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500"></textarea>
                </div>

                <div class="md:col-span-2">
                    <label for="services" class="block text-sm font-medium text-gray-700 mb-2">Services Offered</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        <div class="flex items-center">
                            <input type="checkbox" id="service_1" name="services[]" value="Griha Pravesh"
                                class="h-4 w-4 text-orange-500 border-gray-300 rounded focus:ring-orange-500">
                            <label for="service_1" class="ml-2 text-sm text-gray-700">Griha Pravesh</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="service_2" name="services[]" value="Satyanarayan Puja"
                                class="h-4 w-4 text-orange-500 border-gray-300 rounded focus:ring-orange-500">
                            <label for="service_2" class="ml-2 text-sm text-gray-700">Satyanarayan Puja</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="service_3" name="services[]" value="Vastu Shanti"
                                class="h-4 w-4 text-orange-500 border-gray-300 rounded focus:ring-orange-500">
                            <label for="service_3" class="ml-2 text-sm text-gray-700">Vastu Shanti</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="service_4" name="services[]" value="Ganesh Puja"
                                class="h-4 w-4 text-orange-500 border-gray-300 rounded focus:ring-orange-500">
                            <label for="service_4" class="ml-2 text-sm text-gray-700">Ganesh Puja</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="service_5" name="services[]" value="Kaal Sarp Dosh Nivaran"
                                class="h-4 w-4 text-orange-500 border-gray-300 rounded focus:ring-orange-500">
                            <label for="service_5" class="ml-2 text-sm text-gray-700">Kaal Sarp Dosh Nivaran</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="service_6" name="services[]" value="Navgraha Shanti"
                                class="h-4 w-4 text-orange-500 border-gray-300 rounded focus:ring-orange-500">
                            <label for="service_6" class="ml-2 text-sm text-gray-700">Navgraha Shanti</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8">
                <button type="submit"
                    class="w-full md:w-auto bg-gray-900 hover:bg-gray-700 text-white font-semibold py-3 px-8 rounded-lg shadow-lg transition duration-300">
                    Add Pandit
                </button>
            </div>
        </form>
    </div>

    <script>
        // Handle image upload preview
        document.querySelector('.border-dashed').addEventListener('click', function() {
            document.getElementById('pandit-images').click();
        });
    </script>
@endsection
