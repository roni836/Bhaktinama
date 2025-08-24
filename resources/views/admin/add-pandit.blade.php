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


<div class="flex min-h-screen">
    <div class="hidden md:block w-1/2 bg-orange-500 relative">
        <img src=""
            alt="Pandit Image"
            class="w-full h-full object-cover mix-blend-overlay opacity-90">
    </div>
    <div class="w-full md:w-1/2 flex flex-col justify-center px-8 md:px-16 lg:px-24">

        <a href="{{ url('/pandits') }}" class="text-orange-500 text-sm mb-6 flex items-center">
            ← Go Back
        </a>

        <!-- Title -->
        <h2 class="text-2xl font-bold text-orange-600 mb-6">Add New Pandit</h2>

        <!-- Form -->
        <form action="{{ route('admin.pandits.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
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
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Pandit Name</label>
                <input type="text" name="name" placeholder="Enter the Pandit Name"
                    class="w-full border rounded-md px-4 py-2 focus:ring-2 focus:ring-orange-400 outline-none">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" placeholder="Enter the Email"
                    class="w-full border rounded-md px-4 py-2 focus:ring-2 focus:ring-orange-400 outline-none">
            </div>
            <div>
                <label for="specialization">Specializations</label>
                <select name="specialization[]" multiple class="form-control">
                    <option value="Vastu">Vastu</option>
                    <option value="Marriage">Marriage</option>
                    <option value="Puja">Puja</option>
                    <option value="Griha Pravesh">Griha Pravesh</option>
                </select>
            </div>


            <div>
                <label for="location" class="block text-sm font-medium text-gray-700">Select State</label>
                <select name="location" id="state"
                    class="w-full border rounded-md px-4 py-2 mt-1 focus:ring-2 focus:ring-orange-400 outline-none">
                    <option value="">-- Select State --</option>
                    @foreach($states as $state)
                    <option value="{{ $state }}" @selected(old('state')==$state)>
                        {{ $state }}
                    </option>
                    @endforeach
                </select>
            </div>

            <!-- Description -->
            <div>
                <textarea name="description" rows="3" placeholder="Enter the Description"
                    class="w-full border rounded-md px-4 py-2 focus:ring-2 focus:ring-orange-400 outline-none"></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-[#1F2B50] text-white py-3 rounded-full hover:bg-[#1F2B50] transition">
                Add Pandit
            </button>
        </form>
    </div>

</div>



<script>
    // Handle image upload preview
    document.querySelector('.border-dashed').addEventListener('click', function() {
        document.getElementById('pandit-images').click();
    });
</script>
@endsection