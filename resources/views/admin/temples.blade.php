@extends('layouts.admin')

@section('title', 'Temples Management')

@section('content')
<div class="max-w-7xl mx-auto">

    <body class="bg-gray-50">

        <!-- Header -->
        <div class="px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-orange-600">Temple List</h1>

            <div class="flex items-center space-x-4">
                <!-- Search -->
                <div class="relative">
                    <input type="text" placeholder="Search temples.."
                        class="border rounded-full pl-10 pr-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400">
                    <svg class="w-4 h-4 absolute left-3 top-3 text-orange-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
                    </svg>
                </div>

                <!-- Add Button -->
                <a href="{{ route('admin.temples.create') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-full text-sm font-medium">
                    + Temple
                </a>
            </div>
        </div>

        <!-- Tabs -->
        <div class="px-6 mb-6 flex space-x-4 overflow-x-auto">
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

        <!-- Temple Grid -->
        <div class="px-6 grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Single Temple Card -->
            @foreach($temples as $temple)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ $temple->image }}" class="h-40 w-full object-cover">

                <div class="p-4">
                    <h3 class="text-lg font-semibold">{{ $temple->name }}</h3>
                    <div class="flex justify-between items-center mt-2">
                        <a href="#" class="text-orange-500 text-sm font-medium">
                            View Products & Pandits
                        </a>
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only">
                            <div class="w-10 h-5 bg-gray-300 rounded-full p-1 flex items-center">
                                <div class="bg-white w-4 h-4 rounded-full shadow-md"></div>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
            @endforeach
        </div>



        <div class="px-6 py-4 border-t border-gray-200">
            {{ $temples->links() }}
        </div>
</div>

@endsection