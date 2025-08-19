@extends('layouts.admin')

@section('title', 'Blog Management')

@section('content')
<div class="container mx-auto px-4 py-6">
      
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-orange-600"> Blog List</h1>
        <a href="{{ route('admin.blogs.create') }}" 
           class="bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600 transition">
            + Blog
        </a>
    </div>

    <!-- Filters -->
    <div class="flex flex-wrap items-center justify-between mb-6">
        <div class="flex space-x-3 overflow-x-auto">
            <button class="px-4 py-2 rounded-full bg-orange-500 text-white text-sm">ALL</button>
            <button class="px-4 py-2 rounded-full border text-sm">Patna</button>
            <button class="px-4 py-2 rounded-full border text-sm">Surat</button>
            <button class="px-4 py-2 rounded-full border text-sm">Ahmedabad</button>
            <button class="px-4 py-2 rounded-full border text-sm">Pune</button>
            <button class="px-4 py-2 rounded-full border text-sm">Mumbai</button>
            <button class="px-4 py-2 rounded-full border text-sm">Kolkata</button>
            <button class="px-4 py-2 rounded-full border text-sm">Bangalore</button>
            <button class="px-4 py-2 rounded-full border text-sm">Delhi</button>
        </div>

        <!-- Search -->
        <div class="relative">
            <input type="text" placeholder="Search temples..."
                   class="border rounded-full pl-10 pr-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400">
            <svg class="w-4 h-4 absolute left-3 top-3 text-orange-500" 
                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
            </svg>
        </div>
    </div>


    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($blogs as $blog)
        <div class="bg-white rounded-xl shadow-md overflow-hidden border hover:shadow-lg transition">
            <img src="{{ $blog->image }}" class="h-48 w-full object-cover">

            <div class="p-4">
                <h3 class="text-base font-semibold text-gray-800">{{ $blog->title }}</h3>

                <div class="flex justify-between items-center mt-3">
                    <!-- Left icons -->
                    <div class="flex space-x-3">
                        <!-- Edit -->
                        <a href="{{ route('admin.products.edit', $product->id) }}" 
                           class="text-orange-500 hover:text-orange-600">
                            <i class="fas fa-edit"></i>
                        </a>

                        <!-- Info -->
                        <a href="{{ route('admin.products.show', $product->id) }}" 
                           class="text-blue-500 hover:text-blue-600">
                            <i class="fas fa-info-circle"></i>
                        </a>
                    </div>

                    <!-- Toggle Switch -->
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" {{ $product->status ? 'checked' : '' }}>
                        <div class="w-11 h-6 bg-gray-300 rounded-full peer peer-checked:bg-orange-500 transition"></div>
                        <div class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full shadow-md transition peer-checked:translate-x-5"></div>
                    </label>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $blogs->links() }}
    </div>
</div>
@endsection