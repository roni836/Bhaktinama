@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-gradient-to-r from-orange-500 to-yellow-500 px-6 py-4">
            <h1 class="text-xl font-bold text-white">Edit Profile</h1>
        </div>
        
        <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')
            
            <div class="mb-6 flex flex-col items-center">
                <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-gray-200 mb-4">
                    <img id="profile-preview" src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : 'https://via.placeholder.com/150' }}" alt="Profile" class="w-full h-full object-cover">
                </div>
                <label for="profile_image" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full cursor-pointer hover:bg-gray-300 transition duration-300">
                    <i class="fas fa-camera mr-2"></i> Change Photo
                </label>
                <input type="file" id="profile_image" name="profile_image" class="hidden" accept="image/*" onchange="previewImage(this)">
                @error('profile_image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-gray-700 text-sm font-semibold mb-2">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="phone" class="block text-gray-700 text-sm font-semibold mb-2">Phone Number</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone', Auth::user()->phone) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                    @error('phone')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="address" class="block text-gray-700 text-sm font-semibold mb-2">Address</label>
                    <input type="text" id="address" name="address" value="{{ old('address', Auth::user()->address) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                    @error('address')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="mt-8 flex justify-end">
                <a href="{{ route('user.profile') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-full mr-4 hover:bg-gray-100 transition duration-300">Cancel</a>
                <button type="submit" class="px-6 py-2 bg-orange-500 text-white rounded-full hover:bg-orange-600 transition duration-300">Save Changes</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profile-preview').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
@endsection