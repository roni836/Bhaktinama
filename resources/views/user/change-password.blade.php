@extends('layouts.app')

@section('title', 'Change Password')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-gradient-to-r from-orange-500 to-yellow-500 px-6 py-4">
            <h1 class="text-xl font-bold text-white">Change Password</h1>
        </div>
        
        <form method="POST" action="{{ route('user.change-password.update') }}" class="p-6">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="current_password" class="block text-gray-700 text-sm font-semibold mb-2">Current Password</label>
                <input type="password" id="current_password" name="current_password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                @error('current_password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="new_password" class="block text-gray-700 text-sm font-semibold mb-2">New Password</label>
                <input type="password" id="new_password" name="new_password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                @error('new_password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-6">
                <label for="new_password_confirmation" class="block text-gray-700 text-sm font-semibold mb-2">Confirm New Password</label>
                <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
            </div>
            
            <div class="flex justify-end">
                <a href="{{ route('user.profile') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-full mr-4 hover:bg-gray-100 transition duration-300">Cancel</a>
                <button type="submit" class="px-6 py-2 bg-orange-500 text-white rounded-full hover:bg-orange-600 transition duration-300">Update Password</button>
            </div>
        </form>
    </div>
</div>
@endsection