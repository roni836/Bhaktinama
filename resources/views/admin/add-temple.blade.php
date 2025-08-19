@extends('layouts.admin')

@section('title', 'Add Temple')

@section('content')
<div class="max-w-4xl mx-auto bg-white font-sans">
  
    <div class="flex bg-white font-sans">

        <!-- Left Side Image -->
        <div class="hidden md:block w-1/2 bg-orange-500 relative">
            <img src="https://source.unsplash.com/800x1200/?temple,india" 
                 alt="Temple Image" 
                 class="w-full h-full object-cover mix-blend-overlay opacity-90">
        </div>

        <!-- Right Side Form -->
        <div class="w-full md:w-1/2 flex flex-col justify-center px-8 md:px-16 lg:px-24 py-10">
            
            <!-- Go Back -->
            <a href="{{ url('/admin/temples') }}" class="text-orange-500 text-sm mb-6 flex items-center">
                ← Go Back
            </a>
            <h2 class="text-2xl font-bold text-orange-600 mb-6">Add New Temple</h2>

            <!-- Form -->
            <form action="#" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <!-- Temple Images -->
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:border-orange-500">
                    <label for="images" class="cursor-pointer">
                        <div class="flex flex-col items-center justify-center text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mb-2 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M3 15a4 4 0 014-4h10a4 4 0 014 4m-6-4v-2a2 2 0 10-4 0v2m-6 4h12" />
                            </svg>
                            <p class="text-sm">Click to upload images</p>
                            <p class="text-xs text-gray-400">PNG, JPG up to 5MB (Max. 5 images)</p>
                        </div>
                        <input id="images" type="file" name="images[]" multiple class="hidden" accept="image/*">
                    </label>
                </div>

                <!-- Temple Name -->
                <input type="text" name="name" placeholder="Enter the temple name"
                       class="w-full border rounded-md px-4 py-2 focus:ring-2 focus:ring-orange-400 outline-none">

                <!-- Short Description -->
                <textarea name="short_description" rows="2" placeholder="Enter the short Description"
                          class="w-full border rounded-md px-4 py-2 focus:ring-2 focus:ring-orange-400 outline-none"></textarea>

                <!-- Location -->
                <input type="text" name="location" placeholder="Enter the location"
                       class="w-full border rounded-md px-4 py-2 focus:ring-2 focus:ring-orange-400 outline-none">

                <!-- Package Section -->
                <div class="grid grid-cols-2 gap-4">
                    <input type="text" name="package[]" placeholder="Enter the package"
                           class="w-full border rounded-md px-4 py-2 focus:ring-2 focus:ring-orange-400 outline-none">
                    <input type="text" name="price[]" placeholder="Enter the Amount"
                           class="w-full border rounded-md px-4 py-2 focus:ring-2 focus:ring-orange-400 outline-none">
                </div>
                <button type="button" 
                        class="text-orange-500 text-sm hover:underline">+ Add package</button>

                <!-- Overall Description -->
                <textarea name="overall_description" rows="3" placeholder="Enter the overall Description"
                          class="w-full border rounded-md px-4 py-2 focus:ring-2 focus:ring-orange-400 outline-none"></textarea>

                <!-- Visiting Information -->
                <input type="text" name="visiting_info" placeholder="Enter the Visiting Information"
                       class="w-full border rounded-md px-4 py-2 focus:ring-2 focus:ring-orange-400 outline-none">

                <!-- Facilities & Amenities -->
                <input type="text" name="facilities" placeholder="Enter the Facilities & Amenities"
                       class="w-full border rounded-md px-4 py-2 focus:ring-2 focus:ring-orange-400 outline-none">

                <!-- Add Pandit -->
                <p class="text-xs text-gray-500">
                    To add a Pandit who is available inside the temple, click the ‘Add Pandit’ button.
                </p>
                <a href="{{ url('/pandits/create') }}" class="text-orange-500 text-sm hover:underline">+ Pandit</a>

                <!-- Submit -->
                <button type="submit" 
                        class="w-full bg-indigo-900 text-white py-3 rounded-full hover:bg-indigo-800 transition">
                    Add Temple
                </button>
            </form>
        </div>
    </div>

</div>
@endsection