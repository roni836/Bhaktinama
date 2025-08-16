@extends('layouts.pandit')

@section('title', 'Profile')

@section('header', 'My Profile')

@section('content')
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900">Profile Information</h2>
        </div>
        <div class="p-6">
            <form action="{{ route('pandit.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div class="flex flex-col items-center mb-6">
                    <div class="w-32 h-32 rounded-full bg-gray-300 flex items-center justify-center overflow-hidden mb-4">
                        @if($pandit->profile_image)
                            <img src="{{ asset('storage/' . $pandit->profile_image) }}" alt="{{ $pandit->name }}" class="w-full h-full object-cover">
                        @else
                            <i class="fas fa-user text-gray-500 text-4xl"></i>
                        @endif
                    </div>
                    <label for="profile_image" class="cursor-pointer bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg transition duration-300">
                        <i class="fas fa-camera mr-2"></i> Change Photo
                    </label>
                    <input type="file" id="profile_image" name="profile_image" class="hidden" accept="image/*">
                    @error('profile_image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $pandit->name) }}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $pandit->email) }}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone', $pandit->phone) }}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500">
                        @error('phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="specialization" class="block text-sm font-medium text-gray-700 mb-2">Specialization</label>
                        <input type="text" id="specialization" name="specialization" value="{{ old('specialization', $pandit->specialization) }}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500">
                        @error('specialization')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                        <input type="text" id="location" name="location" value="{{ old('location', $pandit->location) }}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500">
                        @error('location')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div>
                    <label for="bio" class="block text-sm font-medium text-gray-700 mb-2">Bio</label>
                    <textarea id="bio" name="bio" rows="4" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500">{{ old('bio', $pandit->bio) }}</textarea>
                    @error('bio')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex justify-end">
                    <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-300">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow overflow-hidden mt-6">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900">Change Password</h2>
        </div>
        <div class="p-6">
            <form action="{{ route('pandit.changePassword') }}" method="POST" class="space-y-6">
                @csrf
               
                
                <div>
                    <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                    <input type="password" id="current_password" name="current_password" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
                
                <div>
                    <label for="new_password" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                    <input type="password" id="new_password" name="new_password" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
                
                <div>
                    <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
                
                <div class="flex justify-end">
                    <button type="submit" class="bg-gray-900 hover:bg-gray-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-300">
                        Update Password
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // Preview uploaded image
    document.getElementById('profile_image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.querySelector('.w-32.h-32 img') || document.createElement('img');
                img.src = e.target.result;
                img.className = 'w-full h-full object-cover';
                
                const container = document.querySelector('.w-32.h-32');
                if (container.querySelector('i')) {
                    container.querySelector('i').remove();
                }
                if (!container.querySelector('img')) {
                    container.appendChild(img);
                }
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection